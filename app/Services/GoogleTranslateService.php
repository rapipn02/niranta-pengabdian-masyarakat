<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleTranslateService
{
    private $apiKey;
    private $baseUrl = 'https://translation.googleapis.com/language/translate/v2';

    public function __construct()
    {
        $this->apiKey = env('GOOGLE_TRANSLATE_API_KEY');
    }

    /**
     * Translate text using Google Translate API with caching
     */
    public function translate($text, $targetLanguage = 'en', $sourceLanguage = 'id')
    {
        if (!$this->apiKey) {
            Log::warning('Google Translate API key not configured');
            return $text;
        }

        if (empty($text)) {
            return $text;
        }

        // Create a cache key based on text content and languages
        $cacheKey = 'translation_' . md5($text . $sourceLanguage . $targetLanguage);
        
        // Check if translation exists in cache
        $cached = cache($cacheKey);
        if ($cached) {
            Log::info('Using cached translation for: ' . substr($text, 0, 50));
            return $cached;
        }

        try {
            // Build URL with API key as query parameter
            $url = $this->baseUrl . '?key=' . $this->apiKey;
            
            $requestData = [
                'q' => $text,
                'source' => $sourceLanguage,
                'target' => $targetLanguage,
                'format' => 'text'
            ];
            
            $response = Http::timeout(10)->post($url, $requestData);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['data']['translations'][0]['translatedText'])) {
                    $translatedText = $data['data']['translations'][0]['translatedText'];
                    
                    // Cache the translation for 24 hours
                    cache([$cacheKey => $translatedText], now()->addHours(24));
                    
                    return $translatedText;
                } else {
                    Log::error('Unexpected response structure: ' . json_encode($data));
                    return $text;
                }
            } else {
                $errorBody = $response->body();
                $statusCode = $response->status();
                
                // Log specific error details
                Log::error("Google Translate API error (Status: {$statusCode}): " . $errorBody);
                
                // Handle specific error cases
                if ($statusCode === 403) {
                    Log::warning('Google Translate API: Rate limit exceeded or quota exhausted');
                } elseif ($statusCode === 400) {
                    Log::warning('Google Translate API: Bad request - check parameters');
                } elseif ($statusCode === 401) {
                    Log::warning('Google Translate API: Invalid API key');
                }
                
                return $text;
            }
        } catch (\Exception $e) {
            Log::error('Translation failed: ' . $e->getMessage());
            return $text;
        }
    }

    /**
     * Translate array of texts
     */
    public function translateArray($texts, $targetLanguage = 'en', $sourceLanguage = 'id')
    {
        if (!is_array($texts) || empty($texts)) {
            return $texts;
        }

        $translatedTexts = [];
        foreach ($texts as $text) {
            $translatedTexts[] = $this->translate($text, $targetLanguage, $sourceLanguage);
        }

        return $translatedTexts;
    }
}

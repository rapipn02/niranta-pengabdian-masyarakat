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
     * Translate text using Google Translate API
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

        try {
            // Build URL with API key as query parameter
            $url = $this->baseUrl . '?key=' . $this->apiKey;
            
            $requestData = [
                'q' => $text,
                'source' => $sourceLanguage,
                'target' => $targetLanguage,
                'format' => 'text'
            ];
            
            $response = Http::post($url, $requestData);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['data']['translations'][0]['translatedText'])) {
                    return $data['data']['translations'][0]['translatedText'];
                } else {
                    Log::error('Unexpected response structure: ' . json_encode($data));
                    return $text;
                }
            } else {
                Log::error('Google Translate API error: ' . $response->body());
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

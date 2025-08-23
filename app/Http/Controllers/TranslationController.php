<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class TranslationController extends Controller
{
    /**
     * Switch language for static content
     */
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['id', 'en'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        
        return back();
    }
    
    /**
     * Translate dynamic content using Google Translate API
     */
    public function translateDynamicContent(Request $request)
    {
        $text = $request->input('text');
        $targetLanguage = $request->input('target_language', 'en');
        $sourceLanguage = $request->input('source_language', 'id');
        
        // Google Translate API key (you need to get this from Google Cloud Console)
        $apiKey = env('GOOGLE_TRANSLATE_API_KEY');
        
        if (!$apiKey) {
            return response()->json([
                'error' => 'Google Translate API key not configured'
            ], 500);
        }
        
        try {
            $response = Http::post("https://translation.googleapis.com/language/translate/v2", [
                'key' => $apiKey,
                'q' => $text,
                'source' => $sourceLanguage,
                'target' => $targetLanguage,
                'format' => 'text'
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                $translatedText = $data['data']['translations'][0]['translatedText'];
                
                return response()->json([
                    'translated_text' => $translatedText,
                    'source_language' => $sourceLanguage,
                    'target_language' => $targetLanguage
                ]);
            } else {
                return response()->json([
                    'error' => 'Translation failed'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Translation service unavailable'
            ], 500);
        }
    }
    
    /**
     * Get translated content for admin-added content (products, recipes, blogs)
     */
    public function getTranslatedContent($type, $id, $field, $language)
    {
        // For now, return the original content
        // In production, you would cache translations or store them in database
        
        $model = null;
        switch ($type) {
            case 'product':
                $model = \App\Models\Product::find($id);
                break;
            case 'recipe':
                $model = \App\Models\Recipe::find($id);
                break;
            case 'blog':
                $model = \App\Models\Blog::find($id);
                break;
        }
        
        if (!$model || !$model->$field) {
            return response()->json(['error' => 'Content not found'], 404);
        }
        
        $currentLanguage = Session::get('locale', 'id');
        
        // If requesting the same language as stored, return original
        if ($currentLanguage === 'id') {
            return response()->json(['content' => $model->$field]);
        }
        
        // Otherwise, translate using Google API
        $request = new Request([
            'text' => $model->$field,
            'target_language' => $language,
            'source_language' => 'id'
        ]);
        
        return $this->translateDynamicContent($request);
    }
}

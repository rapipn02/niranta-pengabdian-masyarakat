<?php

if (!function_exists('translateDynamic')) {
    /**
     * Helper function to mark content for dynamic translation
     * 
     * @param string $text The text to translate
     * @param string $fallback Fallback text if translation fails
     * @return string
     */
    function translateDynamic($text, $fallback = null)
    {
        $locale = app()->getLocale();
        
        // If it's Indonesian, return original text
        if ($locale === 'id' || empty($text)) {
            return $text;
        }
        
        // For other languages, mark for JS translation
        $fallback = $fallback ?: $text;
        return "<span data-translate=\"true\" data-original=\"{$text}\">{$fallback}</span>";
    }
}

if (!function_exists('staticTranslate')) {
    /**
     * Helper function for static translations with fallback
     * 
     * @param string $key Translation key
     * @param array $replace Replacement parameters
     * @param string $locale Specific locale
     * @return string
     */
    function staticTranslate($key, $replace = [], $locale = null)
    {
        return __($key, $replace, $locale);
    }
}

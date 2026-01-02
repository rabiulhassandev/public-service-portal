<?php

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Session;

if (!function_exists('settings')) {
    function settings($key, $default = null) {
        $locale = Session::get('locale', 'en'); 
        $column = 'value_' . $locale;
        
        static $settingsCache = null;
        
        if ($settingsCache === null) {
            // Check if table exists to avoid errors during migration
            try {
                $settingsCache = SiteSetting::all()->keyBy('key');
            } catch (\Exception $e) {
                return $default;
            }
        }
        
        if (isset($settingsCache[$key])) {
             return $settingsCache[$key]->$column ?? $default;
        }

        return $default;
    }
}

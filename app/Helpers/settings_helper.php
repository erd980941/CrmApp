<?php
if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $settings = cache()->remember('settings_cache', 3600, function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}

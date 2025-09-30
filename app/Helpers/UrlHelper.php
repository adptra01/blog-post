<?php

namespace App\Helpers;

class UrlHelper
{
    /**
     * Get dynamic application URL based on current request
     *
     * @return string
     */
    public static function getAppUrl(): string
    {
        // Priority 1: Check if NGROK_URL is set in .env
        $ngrokUrl = env('NGROK_URL');
        if (!empty($ngrokUrl)) {
            return rtrim($ngrokUrl, '/');
        }

        // Priority 2: Check for ngrok or proxy headers
        $forwardedHost = request()->header('X-Forwarded-Host') ?: request()->header('X-Original-Host');
        if ($forwardedHost) {
            $scheme = request()->isSecure() || request()->header('X-Forwarded-Proto') === 'https' ? 'https' : 'http';
            return $scheme . '://' . $forwardedHost;
        }

        // Priority 3: Check if host contains ngrok
        $host = request()->getHost();
        if (str_contains($host, 'ngrok')) {
            $scheme = request()->isSecure() || request()->header('X-Forwarded-Proto') === 'https' ? 'https' : 'http';
            $port = request()->getPort();
            $url = $scheme . '://' . $host;
            if (!in_array($port, [80, 443])) {
                $url .= ':' . $port;
            }
            return $url;
        }

        // Priority 4: Default 127.0.0.1 for local development
        if (app()->environment('local')) {
            $port = request()->getPort();
            $url = 'http://127.0.0.1';
            if (!in_array($port, [80, 443])) {
                $url .= ':' . ($port ?: 8000);
            }
            return $url;
        }

        // Production URL fallback
        return config('app.url', 'http://127.0.0.1');
    }

    /**
     * Get dynamic storage URL
     *
     * @return string
     */
    public static function getStorageUrl(): string
    {
        return self::getAppUrl() . '/storage';
    }

    /**
     * Force URL scheme and host for current request
     *
     * @param string|null $url
     * @return void
     */
    public static function forceDynamicUrl(?string $url = null): void
    {
        $appUrl = $url ?: self::getAppUrl();

        // Force app URL
        config(['app.url' => $appUrl]);

        // Force storage URL
        config(['filesystems.disks.public.url' => $appUrl . '/storage']);

        // Force asset URL if using Laravel's URL facade
        \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);

        // Force asset URL for all generated URLs
        \Illuminate\Support\Facades\URL::forceScheme(parse_url($appUrl, PHP_URL_SCHEME));

        // Force Filament asset URL (critical for styles/scripts to load correctly)
        if (class_exists(\Filament\Facades\Filament::class)) {
            config(['filament.assets_url' => $appUrl]);
        }
    }
}

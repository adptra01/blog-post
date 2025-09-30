<?php

namespace App\Providers;

use App\Helpers\UrlHelper;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set dynamic URL for flexible localhost/ngrok support
        if ($this->app->environment(['local', 'development'])) {
            UrlHelper::forceDynamicUrl();
        }

        // Force HTTPS scheme for ngrok and reverse proxies
        // This is critical for Filament styles to load correctly via ngrok
        // Prevents mixed content errors (HTTPS page loading HTTP assets)
        if (request()->server('HTTP_X_FORWARDED_PROTO') === 'https' ||
            request()->header('X-Forwarded-Proto') === 'https' ||
            (!empty(env('NGROK_URL')) && str_starts_with(env('NGROK_URL'), 'https'))) {
            URL::forceScheme('https');
        }

        // Force secure asset URLs when using ngrok
        if (!empty(env('NGROK_URL'))) {
            URL::forceRootUrl(env('NGROK_URL'));
        }
    }
}

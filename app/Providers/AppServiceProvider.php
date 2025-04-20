<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Request;

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
    public function boot(Request $request): void
    {
        if (app()->environment('production')) {
            // Force HTTPS for all URLs
            URL::forceScheme('https');

            // Trust all proxies
            $request->setTrustedProxies(
                ['*'],
                Request::HEADER_X_FORWARDED_PROTO
            );

            // Auto run migrations
            try {
                Artisan::call('migrate', ['--force' => true]);
            } catch (\Exception $e) {
                report($e);
            }
        }

        Schema::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;

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
    public function boot()
    {
        if (app()->environment('production')) {
            // Force all URLs to use HTTPS
            URL::forceScheme('https');

            // Migrate database automatically
            try {
                Artisan::call('migrate', ['--force' => true]);
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}

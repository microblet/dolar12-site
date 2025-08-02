<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerDolarServices();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    
    /**
     * Register services for DolarMonitor
     */
    public function registerDolarServices()
    {
        $this->app->singleton(\App\Services\DolarScrapingService::class, function ($app) {
            return new \App\Services\DolarScrapingService();
        });
    }
}

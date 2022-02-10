<?php

namespace Livo\SMSPayvand\Providers;

use Illuminate\Support\ServiceProvider;

class PayvandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->register(PayvandServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/../config/payvand.php' => config_path('payvand.php'),
        ]);
        
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}

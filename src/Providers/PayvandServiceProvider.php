<?php

namespace Livo\SMSPayvand\Providers;

use Illuminate\Support\ServiceProvider;
use Livo\SMSPayvand\Providers\EventServiceProvider;

class PayvandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
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
        ], 'payvand-config' );

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'sms-migrations');
    }
}

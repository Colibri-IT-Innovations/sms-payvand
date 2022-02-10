<?php

namespace Livo\SMSPayvand\Providers;

use Livo\SMSPayvand\Events\SendedSms;
use Livo\SMSPayvand\Listeners\SendSmsNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SendedSms::class => [
            SendSmsNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}

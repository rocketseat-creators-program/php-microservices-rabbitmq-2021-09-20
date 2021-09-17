<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BrokerProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Brokers\Interfaces\BrokerInterface',
            'App\Brokers\RabbitMQ'
        );
    }
}

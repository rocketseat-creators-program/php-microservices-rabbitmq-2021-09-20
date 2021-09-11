<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NotificationProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\Interfaces\NotificationServiceInterface',
            'App\Services\NotificationService'
        );
    }
}

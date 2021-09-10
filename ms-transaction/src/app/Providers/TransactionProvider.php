<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TransactionProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\Interfaces\TransactionServiceInterface',
            'App\Services\TransactionService'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\TransactionRepositoryInterface',
            'App\Repositories\TransactionRepository'
        );
    }
}

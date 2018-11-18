<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Prize\PrizeService;

class PrizeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('prize', function ($app) {
            return $app->make(PrizeService::class);
        });
    }
}

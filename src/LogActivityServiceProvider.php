<?php

namespace Bpocallaghan\LogActivity;

use Bpocallaghan\LogActivity\Providers\EventServiceProvider;
use Illuminate\Support\ServiceProvider;

class LogActivityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
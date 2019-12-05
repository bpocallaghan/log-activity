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
        if (!class_exists('CreateLogActivitiesTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__ . '/../database/migrations/create_log_activities_table.php'       => database_path("/migrations/{$timestamp}_create_log_activities_table.php"),
                __DIR__ . '/../database/migrations/create_log_model_activities_table.php' => database_path("/migrations/{$timestamp}_create_log_model_activities_table.php"),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
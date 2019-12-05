<?php

namespace Bpocallaghan\LogActivity\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Bpocallaghan\LogActivity\LogActivityServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/../database/factories');

        $this->setUpDatabase();
    }

    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LogActivityServiceProvider::class
        ];
    }

    protected function setUpDatabase()
    {
        $this->createActivityLogTable();
    }

    protected function createActivityLogTable()
    {
        include_once __DIR__.'/../database/migrations/create_log_activities_table.php';
        include_once __DIR__ . '/../database/migrations/create_log_model_activities_table.php';

        (new \CreateLogActivitiesTable())->up();
        (new \CreateLogModelActivitiesTable())->up();
    }

    /**
     * Resolve application core configuration implementation.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app): void
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->set('database.default', "sqlite");
        $app['config']->set('database.connections.sqlite.database', ":memory:");
        //$app['config']->set('database.connections.mysql.database', "log_activities");
        //$app['config']->set('database.connections.mysql.username', "root");
        //$app['config']->set('database.connections.mysql.password', "");
    }
}

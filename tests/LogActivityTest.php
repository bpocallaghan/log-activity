<?php

namespace Bpocallaghan\LogActivity\Tests;

use Bpocallaghan\LogActivity\Models\LogActivity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_activity()
    {
        $activity = factory(LogActivity::class)->create([
            'name' => 'Example Name',
        ]);

        //$this->artisan('migrate', ['--database' => 'testbench'])->run();
        // migration
        // events
        // helper
        
        $this->assertDatabaseHas('log_activities', ['name' => 'Example Name',]);
    }
}
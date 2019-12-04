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
            'name' => 'Example Activity',
        ]);
        
        $this->assertDatabaseHas('log_activities', ['name' => 'Example Activity',]);
    }

    /** @test */
    public function can_create_activity_from_helper()
    {
        log_activity('Activity', 'Lorem Ipsum');

        $this->assertDatabaseHas('log_activities', ['name' => 'Activity',]);
    }
}
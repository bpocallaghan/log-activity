<?php

namespace Bpocallaghan\LogActivity\Tests;

use Bpocallaghan\LogActivity\Models\LogActivity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogAdminActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_activity()
    {
        $activity = LogActivity::factory()->create([
            'name' => 'Example Activity',
        ]);

        $this->assertDatabaseHas('log_activities', ['name' => 'Example Activity',]);
    }
}

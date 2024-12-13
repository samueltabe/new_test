<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Activity;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_belongs_to_activity()
    {
        $activity = Activity::factory()->create();
        $task = Task::factory()->create(['activity_id' => $activity->id]);

        $this->assertInstanceOf(Activity::class, $task->activity);
        $this->assertEquals($activity->id, $task->activity->id);
    }
}

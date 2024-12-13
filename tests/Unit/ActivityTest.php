<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Activity;
use App\Models\Task;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_activity_belongs_to_user()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $activity->user);
        $this->assertEquals($user->id, $activity->user->id);
    }

    public function test_activity_has_many_tasks()
    {
        $activity = Activity::factory()->create();
        $tasks = Task::factory()->count(3)->create(['activity_id' => $activity->id]);

        $this->assertCount(3, $activity->tasks);
        $this->assertInstanceOf(Task::class, $activity->tasks->first());
    }
}

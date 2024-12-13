<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Activity;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_task_for_activity()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post("/tasks", [
            'activity_id' => $activity->id,
            'name' => 'New Task',
            'description' => 'New Description'
        ]);

        $response->assertRedirect("/tasks");
        $this->assertDatabaseHas('tasks', ['name' => 'New Task', 'activity_id' => $activity->id]);
    }

}

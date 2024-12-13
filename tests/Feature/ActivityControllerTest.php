<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Activity;

class ActivityControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_activities()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('/activities');
        $response->assertStatus(200);
        $response->assertSee($activity->name);
    }

    public function test_user_can_create_activity()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/activities', [
            'name' => 'New Activity',
        ]);

        $response->assertRedirect('/activities');
        $this->assertDatabaseHas('activities', ['name' => 'New Activity', 'user_id' => $user->id]);
    }

    public function test_user_can_update_activity()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put("/activities/{$activity->id}", [
            'name' => 'Updated Activity',
        ]);

        $response->assertRedirect('/activities');
        $this->assertDatabaseHas('activities', ['name' => 'Updated Activity']);
    }

    public function test_user_can_delete_activity()
    {
        $user = User::factory()->create();
        $activity = Activity::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/activities/{$activity->id}");

        $response->assertRedirect('/activities');
        $this->assertDatabaseMissing('activities', ['id' => $activity->id]);
    }
}

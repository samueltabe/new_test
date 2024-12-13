<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'activity_id' => Activity::factory(),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }
}

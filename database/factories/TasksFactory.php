<?php

namespace Database\Factories;

use App\Models\SettingsProject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(200),
            'priority' => $this->faker->boolean,
            'project_id' => SettingsProject::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

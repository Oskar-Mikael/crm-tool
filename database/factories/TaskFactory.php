<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'priority' => 'High',
            'type_id' => 1,
            'status_id' => 1,
            'customer_id' => 1,
            'created_by_id' => User::first()->id
        ];
    }
}

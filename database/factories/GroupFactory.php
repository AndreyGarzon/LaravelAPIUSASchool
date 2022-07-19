<?php

namespace Database\Factories;


use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_name' => fake()->unique()->sentence(3),
            'group_name' => fake()->unique()->sentence(3),
            'group_name' => fake()->unique()->sentence(3),
            'teacher_id' =>Teacher::factory()
        ];
    }
}

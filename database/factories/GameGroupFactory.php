<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameGroup>
 */
class GameGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_group_name'=>'Letter Recognition',
            'game_group_name'=>'Sound Recognition',
            'game_group_name'=>'Dolch',
        ];
        
    }
}

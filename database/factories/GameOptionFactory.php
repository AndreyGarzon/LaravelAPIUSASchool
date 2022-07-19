<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameOption>
 */
class GameOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'game_option'=>'TRUE',
            'game_option'=>'FALSE',
            'game_option'=>'NULL'
            // 'game_id'=>Game::factory()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\GameOption;
use App\Models\Group;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use NunoMaduro\Collision\Adapters\Phpunit\Style;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameResult>
 */
class GameResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'school_id'=>School::factory(),
            'teacher_id'=>Teacher::factory(),
            'group_id'=>Group::factory(),
            'student_id'=>Student::factory(),
            'game_id'=>Game::factory(),
            'game_option_id'=>GameOption::factory()
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\GameGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'game_group_name'=>'Letter Recognition',
            ],
            [
                'game_group_name'=>'Sound Recognition',
            ],
            [
                'game_group_name'=>'Pre-K Dolch Sight Words',
            ],
            [
                'game_group_name'=>'Kindergarten Dolch Sight Words',
            ],
            [
                'game_group_name'=>'First Grade Dolch Sight Words',
            ],
            [
                'game_group_name'=>'Second Grade Dolch Sight Words',
            ],
            [
                'game_group_name'=>'Third Grade Dolch Sight Words',
            ],
            [
                'game_group_name'=>'Noun Dolch Sight Words',
            ],
            [
                'game_group_name'=>'Lower Letter Recognition',
            ],
            [
                'game_group_name'=>'Upper Letter Recognition',
            ],
            ];
        DB::table('game_groups')->insert($data);
    }
}

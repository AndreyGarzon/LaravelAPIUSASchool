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
                'game_group_name'=>'Dolch',
            ]
            ];
        DB::table('game_groups')->insert($data);
    }
}

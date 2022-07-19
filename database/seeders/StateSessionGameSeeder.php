<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSessionGameSeeder extends Seeder
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
                'state_session_game_name'=>'Complete',
            ],
            [
                'state_session_game_name'=>'Incomplete',
            ]
            ];
        DB::table('state_session_games')->insert($data);
    }
}

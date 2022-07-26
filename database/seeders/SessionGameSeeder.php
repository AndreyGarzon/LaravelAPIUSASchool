<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    for ($j=1; $j <=2; $j++) { 
        for ($i =1; $i <=3; $i++){
            $data = [
                [
                    'state_session_game_id'=>$j,
                    'student_id'=>$i,
                    'game_group_id'=>'1',
                    'created_at'=>now()
                ]
            ];
            DB::table('session_games')->insert($data);
        }
    }
    }
}

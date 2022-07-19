<?php

namespace Database\Seeders;

use App\Models\GameResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j =1; $j <=2; $j++){
            for ($i =1; $i <=52; $i++){
                $data = [
                    [
                        'session_game_id'=>$j,
                        'game_id'=>$i,
                        'game_option_id'=>rand(1,3),
                        'created_at'=>now()
                    ]
                ];
                DB::table('game_results')->insert($data);
            }
        }
    }
}

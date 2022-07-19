<?php

namespace Database\Seeders;

use App\Models\GameOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameOptionSeeder extends Seeder
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
                'game_group_id'=>'1', 
                'game_option_name'=>'TRUE', 
            ],
            [
                'game_group_id'=>'1', 
                'game_option_name'=>'FALSE', 
            ],
            [
                'game_group_id'=>'1', 
                'game_option_name'=>'NULL', 
            ],
            [
                'game_group_id'=>'2', 
                'game_option_name'=>'TRUE', 
            ],
            [
                'game_group_id'=>'2', 
                'game_option_name'=>'FALSE', 
            ],
            [
                'game_group_id'=>'2', 
                'game_option_name'=>'NULL', 
            ],
            [
                'game_group_id'=>'3', 
                'game_option_name'=>'TRUE', 
            ],
            [
                'game_group_id'=>'3', 
                'game_option_name'=>'FALSE', 
            ],
            [
                'game_group_id'=>'3', 
                'game_option_name'=>'NULL', 
            ],
        ];
        DB::table('game_options')->insert($data);
    }
}

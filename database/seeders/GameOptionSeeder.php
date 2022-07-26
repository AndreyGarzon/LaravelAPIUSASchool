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
                'game_option_name'=>'TRUE', 
            ],
            [
                'game_option_name'=>'FALSE', 
            ],
            [
                'game_option_name'=>'NULL', 
            ]
        ];
        DB::table('game_options')->insert($data);
    }
}

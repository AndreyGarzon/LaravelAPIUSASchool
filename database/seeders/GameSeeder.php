<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['game_name'=>'upper_D' ],
            ['game_name'=>'lower_d' ],
            ['game_name'=>'upper_F' ],
            ['game_name'=>'lower_f' ],
            ['game_name'=>'upper_Z' ],
            ['game_name'=>'lower_z' ],
            ['game_name'=>'upper_S' ],
            ['game_name'=>'lower_s' ],
            ['game_name'=>'upper_H' ],
            ['game_name'=>'lower_h' ],
            ['game_name'=>'upper_X' ],
            ['game_name'=>'lower_x' ],
            ['game_name'=>'upper_N' ],
            ['game_name'=>'lower_n' ],
            ['game_name'=>'upper_O' ],
            ['game_name'=>'lower_o' ],
            ['game_name'=>'upper_Y' ],
            ['game_name'=>'lower_y' ],
            ['game_name'=>'upper_P' ],
            ['game_name'=>'lower_p' ],
            ['game_name'=>'upper_I' ],
            ['game_name'=>'lower_i' ],
            ['game_name'=>'upper_J' ],
            ['game_name'=>'lower_j' ],
            ['game_name'=>'upper_C' ],
            ['game_name'=>'lower_c' ],
            ['game_name'=>'upper_M' ],
            ['game_name'=>'lower_m' ],
            ['game_name'=>'upper_T' ],
            ['game_name'=>'lower_t' ],
            ['game_name'=>'upper_G' ],
            ['game_name'=>'lower_g' ],
            ['game_name'=>'upper_L' ],
            ['game_name'=>'lower_l' ],
            ['game_name'=>'upper_A' ],
            ['game_name'=>'lower_a' ],
            ['game_name'=>'upper_Q' ],
            ['game_name'=>'lower_q' ],
            ['game_name'=>'upper_K' ],
            ['game_name'=>'lower_k' ],
            ['game_name'=>'upper_W' ],
            ['game_name'=>'lower_w' ],
            ['game_name'=>'upper_U' ],
            ['game_name'=>'lower_u' ],
            ['game_name'=>'upper_V' ],
            ['game_name'=>'lower_v' ],
            ['game_name'=>'upper_B' ],
            ['game_name'=>'lower_b' ],
            ['game_name'=>'upper_R' ],
            ['game_name'=>'lower_r' ],
            ['game_name'=>'upper_E' ],
            ['game_name'=>'lower_e' ],
            
            ];
        DB::table('games')->insert($data);
    }
}

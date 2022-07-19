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
            ['game_group_id'=>'1','game_name'=>'upper_D' ],
            ['game_group_id'=>'1','game_name'=>'lower_d' ],
            ['game_group_id'=>'1','game_name'=>'upper_F' ],
            ['game_group_id'=>'1','game_name'=>'lower_f' ],
            ['game_group_id'=>'1','game_name'=>'upper_Z' ],
            ['game_group_id'=>'1','game_name'=>'lower_z' ],
            ['game_group_id'=>'1','game_name'=>'upper_S' ],
            ['game_group_id'=>'1','game_name'=>'lower_s' ],
            ['game_group_id'=>'1','game_name'=>'upper_H' ],
            ['game_group_id'=>'1','game_name'=>'lower_h' ],
            ['game_group_id'=>'1','game_name'=>'upper_X' ],
            ['game_group_id'=>'1','game_name'=>'lower_x' ],
            ['game_group_id'=>'1','game_name'=>'upper_N' ],
            ['game_group_id'=>'1','game_name'=>'lower_n' ],
            ['game_group_id'=>'1','game_name'=>'upper_O' ],
            ['game_group_id'=>'1','game_name'=>'lower_o' ],
            ['game_group_id'=>'1','game_name'=>'upper_Y' ],
            ['game_group_id'=>'1','game_name'=>'lower_y' ],
            ['game_group_id'=>'1','game_name'=>'upper_P' ],
            ['game_group_id'=>'1','game_name'=>'lower_p' ],
            ['game_group_id'=>'1','game_name'=>'upper_I' ],
            ['game_group_id'=>'1','game_name'=>'lower_i' ],
            ['game_group_id'=>'1','game_name'=>'upper_J' ],
            ['game_group_id'=>'1','game_name'=>'lower_j' ],
            ['game_group_id'=>'1','game_name'=>'upper_C' ],
            ['game_group_id'=>'1','game_name'=>'lower_c' ],
            ['game_group_id'=>'1','game_name'=>'upper_M' ],
            ['game_group_id'=>'1','game_name'=>'lower_m' ],
            ['game_group_id'=>'1','game_name'=>'upper_T' ],
            ['game_group_id'=>'1','game_name'=>'lower_t' ],
            ['game_group_id'=>'1','game_name'=>'upper_G' ],
            ['game_group_id'=>'1','game_name'=>'lower_g' ],
            ['game_group_id'=>'1','game_name'=>'upper_L' ],
            ['game_group_id'=>'1','game_name'=>'lower_l' ],
            ['game_group_id'=>'1','game_name'=>'upper_A' ],
            ['game_group_id'=>'1','game_name'=>'lower_a' ],
            ['game_group_id'=>'1','game_name'=>'upper_Q' ],
            ['game_group_id'=>'1','game_name'=>'lower_q' ],
            ['game_group_id'=>'1','game_name'=>'upper_K' ],
            ['game_group_id'=>'1','game_name'=>'lower_k' ],
            ['game_group_id'=>'1','game_name'=>'upper_W' ],
            ['game_group_id'=>'1','game_name'=>'lower_w' ],
            ['game_group_id'=>'1','game_name'=>'upper_U' ],
            ['game_group_id'=>'1','game_name'=>'lower_u' ],
            ['game_group_id'=>'1','game_name'=>'upper_V' ],
            ['game_group_id'=>'1','game_name'=>'lower_v' ],
            ['game_group_id'=>'1','game_name'=>'upper_B' ],
            ['game_group_id'=>'1','game_name'=>'lower_b' ],
            ['game_group_id'=>'1','game_name'=>'upper_R' ],
            ['game_group_id'=>'1','game_name'=>'lower_r' ],
            ['game_group_id'=>'1','game_name'=>'upper_E' ],
            ['game_group_id'=>'1','game_name'=>'lower_e' ],
            
            
            ];
        DB::table('games')->insert($data);
    }
}

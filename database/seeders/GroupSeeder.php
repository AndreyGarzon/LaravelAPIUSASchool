<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
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
                'group_name'=>'Group 1',
                'teacher_id'=>'2',
                'education_level_id'=>'1'
            ],
            [
                'group_name'=>'Group 2',
                'teacher_id'=>'2',
                'education_level_id'=>'2'
            ],
            [
                'group_name'=>'Group 3',
                'teacher_id'=>'2',
                'education_level_id'=>'3'
            ],
            [
                'group_name'=>'Group 4',
                'teacher_id'=>'1',
                'education_level_id'=>'4'
            ],
            [
                'group_name'=>'Group 5',
                'teacher_id'=>'1',
                'education_level_id'=>'5'
            ],
            [
                'group_name'=>'Group 6',              
                'teacher_id'=>'1',
                'education_level_id'=>'5',  
            ]

            ];
        DB::table('groups')->insert($data);
    }
}

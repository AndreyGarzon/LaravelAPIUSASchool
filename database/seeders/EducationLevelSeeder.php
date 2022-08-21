<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelSeeder extends Seeder
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
                'education_level_name'=>'Pre-K',  
            ],
            [
                'education_level_name'=>'Kindergarten',
            ],
            [
                'education_level_name'=>'FirstGrade',
            ],
            [
                'education_level_name'=>'ThirdGrade',
            ],
            [
                'education_level_name'=>'Noun',
            ],
        ];
        DB::table('education_levels')->insert($data);
    }
}

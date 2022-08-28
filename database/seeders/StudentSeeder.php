<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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
                'first_name' => 'Student 1',
                'last_name' => '',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student 2',
                'last_name' => '',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student 3',
                'last_name' => '',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student 4',
                'last_name' => '',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student 5',
                'last_name' => '',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student 6',
                'last_name' => '',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student 7',
                'last_name' => '',
                'group_id'=>'3'
            ],
            [
                'first_name' => 'Student 8',
                'last_name' => '',
                'group_id'=>'3'
            ],
            [
                'first_name' => 'Student 9',
                'last_name' => '',
                'group_id'=>'3'
            ],
        ];
        DB::table('students')->insert($data);
    }
}


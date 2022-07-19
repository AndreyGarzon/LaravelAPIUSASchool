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
                'first_name' => 'Student ',
                'last_name' => '1',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '2',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '3',
                'group_id'=>'1'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '4',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '5',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '6',
                'group_id'=>'2'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '7',
                'group_id'=>'3'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '8',
                'group_id'=>'3'
            ],
            [
                'first_name' => 'Student ',
                'last_name' => '9',
                'group_id'=>'3'
            ],
        ];
        DB::table('students')->insert($data);
    }
}


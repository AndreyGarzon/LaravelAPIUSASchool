<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data =  [
            [
                'role_id'=>'1',
                'first_name'=> 'Andrey',
                'last_name'=>'Garzon',
                'email'=>'andreygarzonquiroga@gmail.com',
                'email_verified_at'=>now(),
                'created_at'=>now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => ''
            ],
            [
                'role_id'=>'3',
                'first_name'=> 'Jhon',
                'last_name'=>'Martinez',
                'email'=>'jamarbe05@gmail.com',
                'email_verified_at'=>now(),
                'created_at'=>now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => ''
            ]


        ];
        DB::table('users')->insert($data);



        User::factory(30)->create();
    }

}

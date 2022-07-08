<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SchoolSeeder::class,
            TeacherSeeder::class,
            GroupSeeder::class,
            RoleSeeder::class,
            StudentSeeder::class,
            GameSeeder::class,
            GameOptionSeeder::class,
            GameResultSeeder::class,


        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

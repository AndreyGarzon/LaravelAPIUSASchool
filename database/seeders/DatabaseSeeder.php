<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
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
            RoleSeeder::class,
            UserSeeder::class,
            GameGroupSeeder::class,
            EducationLevelSeeder::class,
            TeacherSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            StateSessionGameSeeder::class,
            SessionGameSeeder::class,
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

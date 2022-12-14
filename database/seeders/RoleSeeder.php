<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
                'role_name'=>'Admin',
            ],
            [
                'role_name'=>'Meister',
            ],
            [
                'role_name'=>'Manager',
            ],
            ];
        DB::table('roles')->insert($data);
    }
}

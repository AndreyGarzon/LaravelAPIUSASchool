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
                'role_name'=>'admin',
            ],
            [
                'role_name'=>'meister',
            ],
            [
                'role_name'=>'manager',
            ],
            ];
        DB::table('roles')->insert($data);
    }
}

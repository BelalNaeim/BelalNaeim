<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $roles = [
            [
                'name' => 'super_admin',
                'guard_name' => 'api',
            ],
            [
                'name' => 'normal_user',
                'guard_name' => 'api',
            ],
        ];

        Role::insert( $roles );
    }
}

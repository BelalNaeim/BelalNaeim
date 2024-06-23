<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make( '123456789' ),
                'phone' => '01099812536',
                //admin role

            ] ];

            Admin::insert( $admins );
        }
    }

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        User::create( [
            'name' => 'Belal',
            'email' => 'admin@gmail.com',
            'password' => bcrypt( '123456' ),
            'category'=>1,
            'district'=>1,
            'post'=>1,
            'setting'=>1,
            'setting'=>1,
            'website'=>1,
            'gallery'=>1,
            'ads'=>1,
            'role'=>1,
            'type'=>1,
        ] );
    }
}

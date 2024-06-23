<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        User::create( [
            'name' => 'Belal',
            'email' => 'admin@app.com',
            'password' => bcrypt( '123456789' ),
        ] );
    }
}

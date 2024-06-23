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
        //
        $user = User::create( [
            'name' => 'super admin',
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt( '12345678' ),
            'mobile' => '01099812636',
            'country' => 'Egypt',
            'role_id' => 1,
            'image'=> 'uploads/profiles/default.png',
            'lang'=>'en',
        ] );
        $user->attachRole( 'super_admin' );
    }
}

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
            'first_name'=>'Belal',
            'last_name'=>'Naeim',
            'Gender'=>'Male',
            'country'=>'Egypt',
            'gov'=>'Damietta',
            'city'=>'Damietta',
            'age'=>30,
            'weight'=>130.3,
            'height'=>189.5,
            'lindate'=>'2023-06-04',
            'tbw'=>60.0,
            'prot'=>21.6,
            'mineral'=>26.6,
            'bfmass'=>37.5,
            'bwei'=>130.9,
            'bmi'=>24.0,
            'pbfat'=>37.5,
            'weco'=>'sleep,diet,sports',
            'insco'=>75,
            'impe'=>345,
        ] );
    }
}

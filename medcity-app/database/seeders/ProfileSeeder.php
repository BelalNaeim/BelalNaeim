<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProfileSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        $profile = Profile::create( [
            'user_id ' => 1,
            'photo'=> 'uploads/profiles/default.png',
            'about' => 'super adminstarator user',
            'phone' => '01099812636',
            'additional_data	' => 'has all permissions granted',
            'created_at' => Carbon::now()->format( 'd-m-Y' ),
        ] );
    }
}

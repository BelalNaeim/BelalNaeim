<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        Setting::create( [
            'logo' => 'logos/logo-dark2x',
            'contact_informations' => 'admin@app.com',
        ] );
    }
}

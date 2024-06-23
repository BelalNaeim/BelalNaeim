<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'name' => 'site_Store',
            'description' => 'Laravel Store Laravel Store Laravel Store Laravel Store Laravel Store Laravel Store Laravel Store ',
            'address' => 'Damietta, Egypt',
            'phone' =>'01099812636'
            ,
            'logo' => 'https://fakeimg.pl/300/',
            'favicon' => 'https://fakeimg.pl/250x100/',
            'email' => 'Store@gmail.com',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'tiktok' => 'https://www.tiktok.com/ar/',
            'youtube' => 'https://www.youtube.com/',
            'instagram' => 'https://www.instagram.com/?hl=ar',

        ]);

    }
}

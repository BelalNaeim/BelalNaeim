<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ads;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads =  json_decode(file_get_contents(__DIR__ . '/data/ads/main.json'), true);

        foreach ($ads as $ad) {
            Ads::create([
                'title'         => $ad['title'],
                'content'       => $ad['content'],
                'image'         => $ad['image'],
                'cover'         => $ad['cover'],
                'expiry_date'   => $ad['expiry_date'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $egyptCities = json_decode(file_get_contents(__DIR__ . '/data/egypt/cities.json'), true);
        $sarCities = json_decode(file_get_contents(__DIR__ . '/data/Saudi-Arabia v2/cities.json'), true);

        foreach ($sarCities as $city) {
            City::create([
                'id' => $city['city_id'],
                'name' => ['ar' => ($city['name_ar']) ?? '', 'en' => ($city['name_en']) ?? ''],
                'region_id' => $city['region_id'],
                'center' => ($city['center']) ?? '',
                'created_at'    => \Carbon\Carbon::now()->subMonth(rand(0,8)),

            ]);
        }

        foreach ($egyptCities as $city) {
            City::create([
                'name' => ['ar' => ($city['city_name_ar']) ?? '', 'en' => ($city['city_name_en']) ?? ''],
                'region_id' => $city['governorate_id'],
                'center' => ($city['center']) ?? '',
                'created_at'    => \Carbon\Carbon::now()->subMonth(rand(0,8)),

            ]);
        }

    }
}

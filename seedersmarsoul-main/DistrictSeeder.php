<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $sarDistricts = json_decode(file_get_contents(__DIR__ . '/data/Saudi-Arabia v2/districts.json'), true);

        foreach ($sarDistricts as $district) {
            District::create([
                'id' => $district['district_id'],
                'name' => ['ar' => ($district['name_ar']) ?? '', 'en' => ($district['name_en']) ?? ''],
                'city_id' => $district['city_id'],
                'region_id' => $district['region_id'],
                'boundaries' => $district['boundaries'],
            ]);
        }
    }
}

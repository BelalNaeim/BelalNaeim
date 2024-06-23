<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $egypt = Country::where('iso2', 'EG')->first();
        $sar = Country::where('iso2', 'SA')->first();
        $egyptRegions = json_decode(file_get_contents(__DIR__ . '/data/egypt/governorates.json'), true);
        $sarRegions = json_decode(file_get_contents(__DIR__ . '/data/Saudi-Arabia v2/regions.json'), true);

        if ($egypt) {
            foreach ($egyptRegions as $region) {
                Region::create([
                    'country_id' => $egypt->id,
                    'name' => ['ar' => ($region['governorate_name_ar']) ?? '', 'en' => ($region['governorate_name_en']) ?? ''],
                    'population' => ($region['population']) ?? 0,
                    'center' => ($region['center']) ?? '',
                    'code' => ($region['code']) ?? '',
                    'boundaries' =>'',
                ]);
            }

        }
        if ($sar) {
            foreach ($sarRegions as $region) {
                Region::create([
                    'country_id' => $sar->id,
                    'name' => ['ar' => ($region['governorate_name_ar']) ?? '', 'en' => ($region['governorate_name_en']) ?? ''],
                    'population' => ($region['population']) ?? 0,
                    'center' => ($region['center']) ?? '',
                    'code' => ($region['code']) ?? '',
                    'boundaries' => '',
                ]);
            }
        }
    }
}

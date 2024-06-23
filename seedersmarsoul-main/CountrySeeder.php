<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries =  json_decode(file_get_contents(__DIR__ . '/data/countries/egypt-and-sar.json'), true);

        foreach ($countries as $countryId => $country) {
            Country::create([
                'id' => $countryId,
                'name' => $country['name'],
                'currency' => $country['currency'],
                'currency_code' => $country['currency_code'],
                'example' => $country['example'],
                'iso2' => $country['iso2'],
                'iso3' => $country['iso3'],
                'active' => $country['active'],
                'calling_code' => $country['calling_code'],
                'flag' => $country['flag'],
            ]);
        }
    }
}

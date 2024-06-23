<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nationality;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationalities =  json_decode(file_get_contents(__DIR__ . '/data/nationalities/main.json'), true);

        foreach ($nationalities as $nationality) {
            Nationality::create([
                'name'                  => $nationality['name'],
                'citc_identityTypeId'   => $nationality['citc_identityTypeId']
            ]);
        }
    }
}

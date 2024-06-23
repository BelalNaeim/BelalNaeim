<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cartype;

class CartypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartypes =  json_decode(file_get_contents(__DIR__ . '/data/cartypes/main.json'), true);

        foreach ($cartypes as $cartype) {
            Cartype::create([
                'name'                  => $cartype['name'],
                'citc_carTypeId'        => $cartype['citc_carTypeId']
            ]);
        }
    }
}

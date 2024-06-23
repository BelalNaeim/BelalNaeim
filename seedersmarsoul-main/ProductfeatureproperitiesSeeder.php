<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Productfeatureproperity;

class ProductfeatureproperitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productfeatureproperities =  json_decode(file_get_contents(__DIR__ . '/data/productfeatureproperities/main.json'), true);

        foreach ($productfeatureproperities as $productfeatureproperity) {
            Productfeatureproperity::create([
                'productfeature_id'                 => $productfeatureproperity['productfeature_id'],
                'properity_id'                      => $productfeatureproperity['properity_id']
            ]);
        }
    }
}

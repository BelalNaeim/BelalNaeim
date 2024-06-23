<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Productfeature;

class ProductfeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productfeatures =  json_decode(file_get_contents(__DIR__ . '/data/productfeatures/main.json'), true);

        foreach ($productfeatures as $productfeature) {
            Productfeature::create([
                'feature_id'                    => $productfeature['feature_id'],
                'product_id'                    => $productfeature['product_id']
            ]);
        }
    }
}

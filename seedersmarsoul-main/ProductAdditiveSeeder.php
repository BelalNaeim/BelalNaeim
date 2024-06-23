<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAdditive;

class ProductAdditiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_additives =  json_decode(file_get_contents(__DIR__ . '/data/product_additives/main.json'), true);

        foreach ($product_additives as $product_additive) {
            ProductAdditive::create([
                'name'                                      => $product_additive['name'],
                'price'                                     => $product_additive['price'],
                'product_id'                                => $product_additive['product_id'],
                'product_additive_category_id'              => $product_additive['product_additive_category_id']
            ]);
        }
    }
}

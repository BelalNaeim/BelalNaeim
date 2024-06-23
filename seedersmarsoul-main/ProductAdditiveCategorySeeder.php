<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAdditiveCategory;

class ProductAdditiveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_additive_categories =  json_decode(file_get_contents(__DIR__ . '/data/product_additive_categories/main.json'), true);

        foreach ($product_additive_categories as $product_additive_category) {
            ProductAdditiveCategory::create([
                'name'                    => $product_additive_category['name'],
                'store_id'                => $product_additive_category['store_id']
            ]);
        }
    }
}

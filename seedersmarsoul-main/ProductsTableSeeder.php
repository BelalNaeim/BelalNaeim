<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =  json_decode(file_get_contents(__DIR__ . '/data/products/main.json'), true);

        foreach ($products as $product) {
            Product::create([
                'store_id'                  => $product['store_id'],
                'store_menu_category_id'    => $product['store_menu_category_id'],
                'name'                      => $product['name'],
                'image'                     => $product['image'],
                'desc'                      => $product['desc'],
                'type'                      => $product['type']
            ]);
        }
    }
}

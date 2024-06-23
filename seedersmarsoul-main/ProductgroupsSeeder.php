<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductGroup;

class ProductgroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_groups =  json_decode(file_get_contents(__DIR__ . '/data/product_groups/main.json'), true);

        foreach ($product_groups as $product_group) {
            ProductGroup::create([
                'properities'                   => $product_group['properities'],
                'price'                         => $product_group['price'],
                'in_stock_type'                 => $product_group['in_stock_type'],
                'in_stock_sku'                  => $product_group['in_stock_sku'],
                'in_stock_qty'                  => $product_group['in_stock_qty'],
                'product_id'                    => $product_group['product_id']
            ]);
        }
    }
}

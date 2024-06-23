<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductGroup;

class AddProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('ar_SA');

        for ($i = 0; $i < 1000; $i++) {
            $product=Product::create([
                'store_id'                  => 30,
                'store_menu_category_id'    => rand(18, 23),
                'name'                      => $faker->name,
                'image'                     =>'image.png',
                'type'                      => 'simple',
            ]);

            ProductGroup::create([
                'properities'                   => null,
                'price'                         => 60,
                'in_stock_type'                 => 'in',
                'in_stock_sku'                  => "p2g1",
                'in_stock_qty'                  =>10,
                'product_id'                    => $product->id,
            ]);
        }
    }

}

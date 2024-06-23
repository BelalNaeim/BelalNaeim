<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HyperpayBrand;

class HyperpayBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hyperpay_brands =  json_decode(file_get_contents(__DIR__ . '/data/hyperpay_brands/main.json'), true);

        foreach ($hyperpay_brands as $brand) {
            HyperpayBrand::create([
                'name'                      => $brand['name'],
                'brand'                     => $brand['brand'],
                'image'                     => $brand['image'],
                'entity_id'                 => $brand['entity_id'],
                'is_active'                 => $brand['is_active']
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreMenuCategory;

class StoreMenuCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store_menu_categories =  json_decode(file_get_contents(__DIR__ . '/data/store_menu_categories/main.json'), true);

        foreach ($store_menu_categories as $store_menu_category) {
            StoreMenuCategory::create([
                'store_id'                  => $store_menu_category['store_id'],
                'name'                      => $store_menu_category['name']
            ]);
        }

        for ($i=0; $i < 10 ; $i++) { 
            StoreMenuCategory::create([
                'name'                  => ['ar' => 'منيو ' . $i , 'en' => 'menu'. $i],
                'store_id'              => rand(1,10)
            ]);
        }
    }
}

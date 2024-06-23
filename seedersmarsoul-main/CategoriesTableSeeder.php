<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  json_decode(file_get_contents(__DIR__ . '/data/categories/main.json'), true);

        foreach ($categories as $category) {
            Category::create([
                'name'      => $category['name'],
                'image'     => $category['image'],
                'slug'      => $category['slug'],
                'status'    => $category['status']
            ]);
        }
    }
}

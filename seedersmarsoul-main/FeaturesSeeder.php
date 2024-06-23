<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features =  json_decode(file_get_contents(__DIR__ . '/data/features/main.json'), true);

        foreach ($features as $feature) {
            Feature::create([
                'name'                      => $feature['name']
            ]);
        }
        Feature::create([
            'name'                      => ['ar' => 'لون'  , 'en' => 'Color'] , 
        ]);
        Feature::create([
            'name'                      => ['ar' => 'خامة'  , 'en' => 'material'] , 
        ]);
        Feature::create([
            'name'                      => ['ar' => 'نوع'  , 'en' => 'Type'] , 
        ]);
        Feature::create([
            'name'                      => ['ar' => 'مساحة'  , 'en' => 'Space'] , 
        ]);
        
        
    }
}

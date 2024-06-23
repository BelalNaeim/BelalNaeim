<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Properity;

class ProperitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properities =  json_decode(file_get_contents(__DIR__ . '/data/properities/main.json'), true);

        foreach ($properities as $peoperity) {
            Properity::create([
                'feature_id'                    => $peoperity['feature_id'],
                'name'                          => $peoperity['name']
            ]);
        }
        // feautre 2 properties
        Properity::create([
            'feature_id'                    => 2,
            'name'                          => ['ar' => 'احمر' , 'en' => 'Red'] ,
        ]);
        Properity::create([
            'feature_id'                    => 2,
            'name'                          => ['ar' => 'ابيض' , 'en' => 'white'] ,
        ]);
        Properity::create([
            'feature_id'                    => 2,
            'name'                          => ['ar' => 'اخضر' , 'en' => 'green'] ,
        ]);
        Properity::create([
            'feature_id'                    => 2,
            'name'                          => ['ar' => 'اصفر' , 'en' => 'yellow'] ,
        ]);
        Properity::create([
            'feature_id'                    => 2,
            'name'                          => ['ar' => 'اسود' , 'en' => 'black'] ,
        ]);
        // feautre 2 properties

        // feautre 3 properties
        Properity::create([
            'feature_id'                    => 3,
            'name'                          => ['ar' => 'جبردين' , 'en' => 'Red'] ,
        ]);
        Properity::create([
            'feature_id'                    => 3,
            'name'                          => ['ar' => 'ميلتون' , 'en' => 'white'] ,
        ]);
        Properity::create([
            'feature_id'                    => 3,
            'name'                          => ['ar' => 'جينز' , 'en' => 'green'] ,
        ]);
        // feautre 3 properties

    }
}

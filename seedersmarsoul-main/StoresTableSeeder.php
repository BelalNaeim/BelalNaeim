<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ar_SA');
        $stores =  json_decode(file_get_contents(__DIR__ . '/data/stores/main.json'), true);
        $approve = ['pending' , 'accept' , 'refused']  ;
        
        foreach ($stores as $store) {
            Store::create([
                'store_id'  => $store['store_id'],
                'name'      => $store['name'],
                'icon'      => $store['icon'],
                'cover'     => $store['cover'],
                'lat'       => $store['lat'],
                'long'      => $store['long'],
                'address'   => $store['address'],
                'category'  => $store['category']
            ]);
        }

        for ($i=0; $i < 10 ; $i++) { 
            $user = User::create([  
                'name'          => 'مدير النظام' . $faker->name , 
                'phone'         => "5133332311$i",
                'country_key'   => '0096',
                'type'          => 'store',
                'email'         => $faker->unique()->email,
                'password'      => 123456,
                'approve'       => $approve[rand(0,2)]
            ]);

            $user->store()->create([
                'icon'                  => 'default.png' , 
                'cover'                 => 'default.png' , 
                'commercial_image'      => 'default.png' ,  
                'name'                  => ['ar' => ' مطعم ' . $i  , 'en' => 'resturant ' . $i ] , 
                'category'              => 'restaurants' ,
                'commercial_id'         => rand(1,10),
                'address'               => $faker->address ,
                'lat'                   => $faker->latitude ,
                'long'                  => $faker->longitude ,
                'bank_name'             => $faker->name ,
                'iban_number'           => $faker->iban('00966') ,
                'has_contract'          => 'true' ,
            ]);
        }
        for ($i=0; $i < 10 ; $i++) { 
            $user = User::create([  
                'name'          => 'مدير النظام الفرعي' . $faker->name , 
                'phone'         => "513333311$i",
                'country_key'   => '0096',
                'type'          => 'store',
                'email'         => $faker->unique()->email,
                'password'      => 123456,
            ]);

            $user->store()->create([
                'icon'                  => 'default.png' , 
                'cover'                 => 'default.png' , 
                'commercial_image'      => 'default.png' , 
                'name'                  => ['ar' => ' مطعم فرعي ' . $i . $i , 'en' => 'resturant '  . $i . $i] , 
                'category'              => 'restaurants' ,
                'commercial_id'         => rand(1,10),
                'address'               => $faker->address ,
                'lat'                   => $faker->latitude ,
                'long'                  => $faker->longitude ,
                'bank_name'             => $faker->name ,
                'iban_number'           => $faker->iban('00966') ,
                'store_id'              => rand(1,10),
                'has_contract'          => 'true' ,
            ]);
        }

    }
}
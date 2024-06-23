<?php

namespace Database\Seeders;

use App\Models\Complain;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ComplainSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ar_SA');

        for ($i=0; $i < 10 ; $i++) { 
            Complain::create([
                'user_id'   => rand(1,10)   , 
                'subject'   => $faker->name , 
                'text'      => $faker->text , 
                'src'       => $faker->url, 
                'phone'     =>  "5133332311$i" , 
            ]);
        }
    }
}

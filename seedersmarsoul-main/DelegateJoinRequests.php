<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DelegateJoinrequest;
use Faker\Factory as Faker;

class DelegateJoinRequests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ar_SA');
        for ($i = 0; $i < 10; $i++) {
            DelegateJoinrequest::create([
                // 'user_id'                           =>   '' ,
                'company_id'                        =>   rand(1 , 5) ,
                'fullname'                          =>   $faker->name ,
                'identity_card'                     =>   '92370497374'.rand(111,99999) ,
                'nationality_id'                    =>   rand(1,2) ,
                'driver_date_of_birth'              =>   \Carbon\Carbon::now()->subYears(rand(20,30)) ,
                'sponsor_name'                      =>   $faker->name ,
                'region_id'                         =>   rand(1,2) ,
                'city_id'                           =>   rand(1,10) ,
                'email'                             =>   $faker->unique()->email ,
                'country_key'                       =>   '0096' ,
                'phone'                             =>   "51111111$i" ,
                'address'                           =>   $faker->address ,
                'bank_acc_number'                   =>   rand(11111,9999999999999) ,
                'bank_iban_number'                  =>   rand(11111,9999999999999) ,
                'car_type_id'                       =>   rand(1,5) ,
                'car_numbers'                       =>   rand(11111,9999999999999),
                'car_letters'                       =>   'KKNK M KNS ' ,
                'car_model'                         =>   rand(2000 , 2022) ,
                'manufacturing_year'                =>   rand(2000 , 2022) ,
                'personal_image'                    =>   'default.png' ,
                'driving_license'                   =>   'default.png' ,
                'identity_card_image'               =>   'default.png' ,
                'car_back'                          =>   'default.png' ,
                'car_front'                         =>   'default.png' ,
            ]);
        }
    }
}

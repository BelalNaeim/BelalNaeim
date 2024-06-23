<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ar_SA');
        $status = ['active' , 'pending'] ;
        $approve = ['accept' , 'pending' , 'refused'] ;
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name'          => 'شركة مناديب ' . $faker->name,
                'approve'       => $approve[rand(0,2)],
                'phone'         => "51111111$i",
                'country_key'   => '002',
                'type'          => 'company',
                'active'        => rand(1,0),
                'email'         => $faker->unique()->email,
                'password'      => 123456789,
                'status'        => $status[rand(0,1)],
                'address'       => 'Mansoura',
            ]);

            $user->delegateCompany()->create([
                'commercial_number'         => '2154874512' ,
                'commercial_image'          => 'default.png' ,
                'bank_account_number'       => '29174947927497294' ,
                'city_id'                   => 1 ,
            ]);
        }
    }
}

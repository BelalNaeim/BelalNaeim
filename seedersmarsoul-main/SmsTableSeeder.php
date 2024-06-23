<?php
namespace Database\Seeders;

use App\Models\SMS;
use Illuminate\Database\Seeder;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SMS::create([
            'name'        => 'باقة يمامة',
            'key'         => 'yamamah',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 1 ,
        ]);
        SMS::create([
            'name'        => 'باقة فور جوالي',
            'key'         => '4jawaly',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة gateway',
            'key'         => 'gateway',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة hisms',
            'key'         => 'hisms',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة مسجات',
            'key'         => 'msegat',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة oursms',
            'key'         => 'oursms',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة unifonic',
            'key'         => 'unifonic',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
        SMS::create([
            'name'        => 'باقة زين',
            'key'         => 'zain',
            'sender_name' => "sender_name",
            'user_name'   => 'user_name',
            'password'    => '123456',
            'active'      => 0 ,
        ]);
    }
}

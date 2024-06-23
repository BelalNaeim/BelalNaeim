<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = [
            'name' => 'user',
            'phone' => '1551244085',
            'country_key' => '002',
            'email' => 'aait@info.com',
            'password' => 123456789,
            'status' => 'pending',
            'address' => 'Mansoura',
            // 'role_id' => 1,
            // 'is_admin' => 1,
            // 'type' => 'admin',
            'active' => true,
            'gender' => 'male',
        ];
        User::create($user);
    }
}

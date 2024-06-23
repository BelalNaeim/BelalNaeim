<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paymentmethod;

class PaymentmethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentmethods =  json_decode(file_get_contents(__DIR__ . '/data/paymentmethods/main.json'), true);

        foreach ($paymentmethods as $paymentmethod) {
            Paymentmethod::create([
                'name'                      => $paymentmethod['name'],
                'key'                       => $paymentmethod['key'],
                'image'                     => $paymentmethod['image'],
                'desc'                      => $paymentmethod['desc']
            ]);
        }
    }
}

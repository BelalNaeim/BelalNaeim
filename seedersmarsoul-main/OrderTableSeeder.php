<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Order;
use App\Models\User;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        order::create([
            'store_id'                  =>  Store::where('has_contract' , 'true')->inRandomOrder()->first()->id   ,
            // 'store_name'                =>  null   ,
            // 'store_icon'                =>  null   ,
            // 'place_id'                  =>  ''   ,
            // 'place_name'                =>  ''   ,
            // 'place_icon'                =>  ''   ,
            'deliver_time'              =>  '1'   ,
            'receive_lat'               =>  '31.0437192'   ,
            'receive_long'              =>  '31.3873078'   ,
            'receive_address'           =>  'المنصورة مجمع المحاكم'   ,
            'deliver_lat'               =>  '31.0059162'   ,
            'deliver_long'              =>  '31.4833668'   ,
            'deliver_address'           =>  'ميت علي - المنصورة'   ,
            // 'coupon'                    =>     ,
            'type'                      =>  'special_stores'     , //'special_stores','google_places','parcel_delivery','special_request'
            'payment_type'              =>  'online'            ,
            // 'description'               =>  ''   ,
            'delivery_price'            =>  '20'   ,
            'price'                     =>  '100'   ,
            'app_percentage'            =>  '10'   ,
            'added_value'               =>  '2'   ,
            // 'discount'                  =>  '132'   ,
            'total_price'               =>  '132'   ,
            'user_id'                   =>  User::where('type' , 'user')->inRandomOrder()->first()->id   ,
            // 'min_expected_price'        =>  ''   ,
            // 'max_expected_price'        =>  ''   ,
            // 'delegate_id'               =>  User::where('type' , 'user')->inRandomOrder()->first()->id   ,
            'payment_status'            =>  'true'   ,
            'delivery_status'           =>  ''   ,
            'status'                    =>  'open'   ,
            'price'                     =>  'pending'   , // 'pending','accepted','delivering','reached_store','reached_receive_location','reached_deliver_location','delivered'
            'total_price'               =>  ''   ,
            'invoice_image'             =>  ''   ,
            'have_invoice'              =>  ''   ,
            'close_reason'              =>  ''   ,
            'store_status'              =>  ''   ,
            'needs_delivery'            =>  ''   ,
            'delegate_acceptance'       =>  ''   ,    
        ]);
    }
}

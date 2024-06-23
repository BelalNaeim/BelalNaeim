<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        
       

    public function run()
    {
        $data = [];
        for($i=0 ; $i<4 ; $i++){
            $data[]=[
                'name'=>'test',
                'city'=>'city',
                'branch'=>'branch',
                'swift_code'=>'112',
            ];
        }
            
        Bank::insert($data);
        
    }
}

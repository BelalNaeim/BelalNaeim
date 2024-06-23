<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intro;
use DB ;
class IntrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intros =  json_decode(file_get_contents(__DIR__ . '/data/intros/main.json'), true);

        foreach ($intros as $intro) {

            DB::table('intros')->insert([
                'image'          => $intro['image'] , 
                'title'          => json_encode($intro['title']) ,
                'desc'           => json_encode($intro['desc']) ,
            ]);
        }
    }
}

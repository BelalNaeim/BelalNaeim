<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reason;

class ReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons =  json_decode(file_get_contents(__DIR__ . '/data/reasons/main.json'), true);

        foreach ($reasons as $reason) {
            Reason::create([
                'reason'                    => $reason['reason'],
                'type'                      => $reason['type']
            ]);
        }
    }
}

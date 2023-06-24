<?php

namespace Database\Seeders;

use App\Models\Apply;
use Illuminate\Database\Seeder;

class ApplyTableSeeder extends Seeder
{

    public function run()
    {
        for($i = 0 ; $i <= 100 ; $i++) {
            Apply::create([
                'student_id'   =>  rand(1,10),
                'formation_id' => rand(1,30),
                'status'       => rand(1,4)
            ]);
        }
    }

}

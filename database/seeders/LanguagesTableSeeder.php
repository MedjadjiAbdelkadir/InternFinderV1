<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder{
    public function run(){
        for($i = 0; $i <25 ; $i++){
            Language::create([
                'language_id' => rand(1,3), 
                'level_id'    => rand(1,7),
                'student_id'  => rand(1,10),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationLanguage;

class FormationLanguagesTableSeeder extends Seeder{

    public function run(){
        for($i = 0 ; $i <= 40 ; $i++) {
            FormationLanguage::create([
                'language_id'   => rand(1,3),
                'level_id' => rand(1,7) ,
                'formation_id'   => rand(1,30),
            ]);
        }

    }
}

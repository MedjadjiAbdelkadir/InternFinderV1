<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationEducationUniversity;

class FormationEducationUniversitiesTableSeeder extends Seeder
{

    public function run(){
        for($i = 0 ; $i <= 50 ; $i++) {
            FormationEducationUniversity::create([
                'specialty_id'   => rand(1,33),
                'degree_id' => rand(1,3) ,
                'formation_id'   => rand(1,30),
            ]);
        }
    }
}

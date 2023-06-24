<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationExperience;

class FormationExperiencesTableSeeder extends Seeder{

    public function run(){
 
        for($i = 0 ; $i <= 40 ; $i++) {
            FormationExperience::create([
                'specialty'    => 'Specialty '.rand(1,8) ,
                'duration_id'  => rand(1,6),
                'formation_id'   => rand(1,30),
            ]);
        }
    }
}

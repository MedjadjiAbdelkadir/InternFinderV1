<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormationEducationInstitute;

class FormationEducationInstitutesTableSeeder extends Seeder{

    public function run(){
        $names= [
                'Informatique' ,
                'Management and economy',
                'Human resources management',
                'Industrial hygiene and safety',
                'Mechanical',
                'electricity',
                ' Computer repair'
        ];
        for($i = 0 ; $i <= 50 ; $i++) {
            FormationEducationInstitute::create([
                'name'   => $names[rand(0,6)],
                'degree_id' => rand(1,5) ,
                'formation_id'   => rand(1,30),
            ]);
        }
    }
}

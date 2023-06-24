<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Faker\Factory as Faker;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder{

    public function run(){
        $faker = Faker::create();
        for($i = 0; $i <45 ; $i++){
            Experience::create([
                'specialty'   => $faker->sentence(3), 
                'company'     => $faker->company(),
                'description'    =>  $faker->paragraph(15),
                'duration_id' => rand(1,6),
                'job_id'      => rand(1,340), 
                'student_id'  => rand(1,10),
            ]);
        }
    }
}

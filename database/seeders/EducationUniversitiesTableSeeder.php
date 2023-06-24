<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\EducationUniversity;

class EducationUniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(){
        $faker = Faker::create();
        for($i = 0; $i <= 30 ; $i++){
            EducationUniversity::create([
                'description'    =>  $faker->paragraph(15),
                'start'        =>Carbon::now(),
                'end'          => Carbon::now()->addYears(3) ,
                'student_id'     =>  rand(1,10),
                'university_id'  => rand(1,90),
                'specialty_id'   => rand(1,50) ,
                'degree_id'      => rand(1,3),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\EducationInstitute;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Faker\Factory as Faker;
class EducationInstitutesTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i <45 ; $i++){
            EducationInstitute::create([
                'name'            => $faker->name(),
                'specialty'       => $faker->sentence(),
                'description'    =>  $faker->paragraph(15),
                'start'        =>Carbon::now(),
                'end'          => Carbon::now()->addYears(3) ,
                'student_id'     =>  rand(1,10),
                'degree_id' => rand(1,5),
            ]);
        }
    }
}

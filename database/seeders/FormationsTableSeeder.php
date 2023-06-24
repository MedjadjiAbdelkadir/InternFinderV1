<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Formation;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class FormationsTableSeeder extends Seeder{

    public function run(){

        $faker = Faker::create();
        for($i = 0 ; $i <= 30 ; $i++) {
            Formation::create([
                'title'        => $faker->sentence(3),
                'nbr_place'    => rand(1,8) ,
                'permanence'   => rand(1,2),
                'start'        =>Carbon::now(),
                'end'          => Carbon::now()->addDays(20) ,
                'description'  => $faker->paragraph(5),
                'municipal_id' => rand(1,1541),
                'company_id'   => rand(1,33),
            ]);
        }

    }
}

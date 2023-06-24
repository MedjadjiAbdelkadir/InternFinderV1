<?php

namespace Database\Seeders;

use App\Models\DegreeUniversity;
use Illuminate\Database\Seeder;

class DegreeUniversitiesTableSeeder extends Seeder
{

    public function run(){
        DegreeUniversity::create([
            'name' =>'Licence'
        ]);
        DegreeUniversity::create([
            'name' =>'Master'
        ]);
        DegreeUniversity::create([
            'name' =>'PHD'
        ]);
    }
}

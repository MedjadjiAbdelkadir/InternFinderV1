<?php

namespace Database\Seeders;

use App\Models\DurationExperience;
use Illuminate\Database\Seeder;

class DurationExperiencesTableSeeder extends Seeder{

    public function run(){
        DurationExperience::create([
        'duration' => '6 months',
        ]) ;
        DurationExperience::create([
            'duration' => '1 year',
        ]) ;
        DurationExperience::create([
            'duration' => '2 years',
        ]) ;
        DurationExperience::create([
            'duration' => '3 years',
        ]) ;
        DurationExperience::create([
            'duration' => '4 years',
        ]) ;
        DurationExperience::create([
            'duration' => '5 years or more',
        ]) ;
    }
}

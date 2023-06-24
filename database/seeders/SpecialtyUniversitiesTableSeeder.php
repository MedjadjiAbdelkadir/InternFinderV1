<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpecialtyUniversity;
use Illuminate\Support\Facades\Storage;

class SpecialtyUniversitiesTableSeeder extends Seeder
{

    public function run(){
        $data = Storage::disk('local')->get('/json/specialty_universities.json');

        $specialty_universities = json_decode($data , true) ;
        
        foreach($specialty_universities as $specialty_university){
            SpecialtyUniversity::query()->updateOrCreate([
                'name' => $specialty_university['name'] ,
            ]);
        }
    }
}

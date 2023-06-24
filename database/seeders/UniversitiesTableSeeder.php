<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UniversitiesTableSeeder extends Seeder
{

    public function run()
    {
        $data = Storage::disk('local')->get('/json/universities_algeria.json');

        $universities_algeria = json_decode($data , true) ;

        foreach($universities_algeria as $universities_algeria){
            University::query()->updateOrCreate([
                'name' => $universities_algeria['name'],
            ]);
        }
    }
}

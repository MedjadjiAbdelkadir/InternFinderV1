<?php

namespace Database\Seeders;

use App\Models\ListLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ListLanguagesTableSeeder extends Seeder{

    public function run(){
        $data = Storage::disk('local')->get('/json/languages.json');

        $languages = json_decode($data , true) ;

        foreach($languages as $language){
            ListLanguage::query()->updateOrCreate([
                'name' => $language['name'] ,
            ]);
        }
    }
}

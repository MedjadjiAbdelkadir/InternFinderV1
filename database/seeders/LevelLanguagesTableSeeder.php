<?php

namespace Database\Seeders;

use App\Models\LevelLanguage;
use Illuminate\Database\Seeder;

class LevelLanguagesTableSeeder extends Seeder{
    public function run(){
        $levels = ['Native','A1','A2','B1','B2','C1','C2'];

        foreach($levels as $level){
            LevelLanguage::create([
                'level' => $level ,
            ]);
        }
    }
}

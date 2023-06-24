<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StatesTableSeeder extends Seeder{

    public function run(){
        $data = Storage::disk('local')->get('/json/states.json');

        $states = json_decode($data , true) ;

        foreach($states as $state){
            State::query()->updateOrCreate([
                'code' =>$state['code'],
                'name' => $state['name'] ,
                'ar_name' => $state['ar_name'] ,
            ]);
        }
    }
}

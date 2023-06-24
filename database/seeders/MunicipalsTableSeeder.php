<?php

namespace Database\Seeders;

use App\Models\Municipal;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class MunicipalsTableSeeder extends Seeder{

    public function run(){

        $data = Storage::disk('local')->get('/json/municipalities.json');
        $municipalities = json_decode($data , true) ;

        foreach($municipalities as $municipal){
            Municipal::query()->updateOrCreate([
                'post_code' => $municipal['post_code'],
                'name'      => $municipal['name'] ,
                'ar_name'   => $municipal['ar_name'] ,
                'state_id'  => $municipal['wilaya_id'] ,
            ]);
        }
    }
}

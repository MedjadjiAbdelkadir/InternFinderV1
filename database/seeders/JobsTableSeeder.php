<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class JobsTableSeeder extends Seeder
{
    public function run()
    {
        $data = Storage::disk('local')->get('/json/jobs.json');

        $jobs = json_decode($data , true) ;

        foreach($jobs as $job){
            Job::query()->updateOrCreate([
                'name' => $job['name'] ,
            ]);
        }
    }
}

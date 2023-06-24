<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;
class CompanyTableSeeder extends Seeder
{



    public function run(){


        $data = Storage::disk('local')->get('/json/companies.json');

        $faker = Faker::create();
        $companies = json_decode($data , true) ;

        foreach($companies as $company){
            $name = $company['name'] ;
            $email = Str::of($name)->words(3,'');
            $email = Str::lower(str_replace(' ( ', '.', $email));
            $email = Str::lower(str_replace(' ) ', '.', $email));
            $email = Str::lower(str_replace('(', '.', $email));
            $email = Str::lower(str_replace(')', '.', $email));
            $email = Str::lower(str_replace(' ', '.', $email));
            $email = Str::lower(str_replace('-', '.', $email));
            $email = Str::lower(str_replace('/', '.', $email));

            Company::query()->updateOrCreate([
                
                'name'      =>  ucfirst($company['name']) ,
                // Str::lower(str_replace(' ', '.', $company['ar_name']).'@gmail.com');
                'email'     =>  Str::lower($email.'@gmail.com'),
                'password'  =>  Hash::make('12345678') ,
                'phone'     =>  '0'.rand(5,7).rand(4,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9) ,
                'company_type'    =>  $company['id'] % 3 == 0 ? 'Private':'Public',
                'category'        => $company['category'] ,
                'municipal_id'    => rand(1,1541),
                'address'         =>  $company['address'] ,
                'description'     =>  $company['description'] ,
                'avatar'          =>  $company['logo'] ,
            ]);
        }
    }
}

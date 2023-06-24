<?php

namespace Database\Seeders;

use App\Models\DegreeInstitute;
use Illuminate\Database\Seeder;

class DegreeInstitutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DegreeInstitute::create([
            'name' => 'Certificate of Specialized Vocational Training',
            'level' => 1
        ]);
        DegreeInstitute::create([
            'name' => 'Certificate of Professional Competence',
            'level' => 2
        ]);
        DegreeInstitute::create([
            'name' => 'Professional skill certificate',
            'level' => 3
        ]);
        DegreeInstitute::create([
            'name' => 'The fourth Level',
            'level' => 4
        ]);
        DegreeInstitute::create([
            'name' => 'Senior Technician Certificate',
            'level' => 5
            
        ]);
    }
}

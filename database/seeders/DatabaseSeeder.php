<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JobsTableSeeder;
use Database\Seeders\AdminTableSeeder;
use Database\Seeders\ApplyTableSeeder;
use Database\Seeders\EmptyTableSeeder;
use Database\Seeders\StatesTableSeeder;
use Database\Seeders\CompanyTableSeeder;
use Database\Seeders\StudentsTableSeeder;
use Database\Seeders\LanguagesTableSeeder;
use Database\Seeders\FormationsTableSeeder;
use Database\Seeders\MunicipalsTableSeeder;
use Database\Seeders\ExperiencesTableSeeder;
use Database\Seeders\UniversitiesTableSeeder;
use Database\Seeders\ListLanguagesTableSeeder;
use Database\Seeders\LevelLanguagesTableSeeder;
use Database\Seeders\DegreeInstitutesTableSeeder;
use Database\Seeders\DegreeUniversitiesTableSeeder;
use Database\Seeders\FormationLanguagesTableSeeder;
use Database\Seeders\DurationExperiencesTableSeeder;
use Database\Seeders\EducationInstitutesTableSeeder;
use Database\Seeders\FormationExperiencesTableSeeder;
use Database\Seeders\EducationUniversitiesTableSeeder;
use Database\Seeders\SpecialtyUniversitiesTableSeeder;
use Database\Seeders\FormationEducationInstitutesTableSeeder;
use Database\Seeders\FormationEducationUniversitiesTableSeeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            // EmptyTableSeeder::class,
            StatesTableSeeder::class,
            MunicipalsTableSeeder::class,
            AdminTableSeeder::class,
            CompanyTableSeeder::class,
            StudentsTableSeeder::class,
            
            UniversitiesTableSeeder::class,
            SpecialtyUniversitiesTableSeeder::class,
            DegreeUniversitiesTableSeeder::class,
            EducationUniversitiesTableSeeder::class,

            DegreeInstitutesTableSeeder::class,
            EducationInstitutesTableSeeder::class,

            JobsTableSeeder::class,
            DurationExperiencesTableSeeder::class,
            ExperiencesTableSeeder::class,

            ListLanguagesTableSeeder::class,
            LevelLanguagesTableSeeder::class,
            LanguagesTableSeeder::class,

            FormationsTableSeeder::class,
            FormationEducationUniversitiesTableSeeder::class,
            FormationEducationInstitutesTableSeeder::class,
            FormationExperiencesTableSeeder::class,
            FormationLanguagesTableSeeder::class,

            ApplyTableSeeder::class,
        ]);
    }
}

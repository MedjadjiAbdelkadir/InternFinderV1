<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmptyTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('companies')->delete();
        DB::table('students')->delete();
        DB::table('universities')->delete();
        DB::table('municipals')->delete();
        DB::table('states')->delete();
    }
}

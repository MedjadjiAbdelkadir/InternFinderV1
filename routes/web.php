<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\GetStudents;
use App\Http\Controllers\Publics\GetMunicipalities;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('PAGINATE_COUNT',6);

Route::get('/test/number', function () {
    // $pins = [];
    // for ($j=0; $j <= 9; $j++) { 
    //     $nu = rand(0,9);
    // }
    // return $nu;

    return '0'.rand(5,7).rand(4,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/city', GetMunicipalities::class);

Route::get('/getApply/students', GetStudents::class);





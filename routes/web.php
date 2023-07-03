<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\GetStudents;
use App\Http\Controllers\Publics\HomeController;
use App\Http\Controllers\Company\ApplyController;
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
Route::get('/testing/company' , function(){
    return auth('company')->user();
});

Route::get('/',[HomeController::class , 'index'])->name('home');
Route::get('/formations',[HomeController::class , 'getAllFormations'])->name('formations');
Route::get('/formations/{id}',[HomeController::class , 'getFormationsById'])->name('formation');


Route::get('/companies',[HomeController::class , 'getAllCompanies'])->name('companies');
Route::get('/companies/{id}',[HomeController::class , 'getAllFormationsByCompany'])->name('company.byId');

Route::post('/search',[HomeController::class , 'searchFormations'])->name('search.formations');

Route::resource('/apply', ApplyController::class)->except(['create'])->middleware('auth:student');


// search.formations
Route::get('/city', GetMunicipalities::class);

Route::get('/getApply/students', GetStudents::class);





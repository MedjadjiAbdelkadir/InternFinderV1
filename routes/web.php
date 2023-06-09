<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/city', GetMunicipalities::class);




<?php

use Illuminate\Support\Facades\Route;


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


/* ------------------------  Start Admin Routes ------------------------ */
Route::middleware('auth:admin')->group(function(){
    Route::get('/', function(){
        return 'Admin routes index';
    })->name('index');
});

/* ------------------------  End Admin Routes ------------------------ */


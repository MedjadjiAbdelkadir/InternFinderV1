<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


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


/* ------------------------  Start Auth Routes ------------------------ */

Route::group([], function(){

    # Register Select Form :
    Route::get('/register',[AuthController::class, 'selectForm'] )->name('select.form.register');
 
    # Register Company Form :
    Route::get('/register/company',[AuthController::class, 'registerFormCompany'] )->name('register.form.company');

    Route::post('/register/company',[AuthController::class, 'registerCompany'] )->name('register.company');

    # Register Student Form :
    Route::get('/register/student',[AuthController::class, 'registerFormStudent'] )->name('register.form.student');

    Route::post('/register/student',[AuthController::class, 'registerStudent'] )->name('register.student');


    # Login form
    Route::get('/login',[AuthController::class, 'loginForm'])->name('loginForm');
    # Login
    Route::post('/login',[AuthController::class, 'login'])->name('login');

});

Route::group(['middleware' => 'auth:company,student'], function(){
    # Logout
    Route::get('/logout',[AuthController::class, 'logout'] )->name('logout');
});

/* ------------------------  End Auth Routes ------------------------ */

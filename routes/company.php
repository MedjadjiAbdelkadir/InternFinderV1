<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\AccountController;
use App\Http\Controllers\Company\ApplyController;
use App\Http\Controllers\Company\FormationController;


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

/* ------------------------  Start Company Routes ------------------------ */

Route::middleware('auth:company')->group(function(){
    Route::get('/', [AccountController::class, 'show'])->name('index');
    Route::put('/Account/profile', [AccountController::class, 'update'])->name('update');

    Route::get('/Account/settings', [AccountController::class, 'settings'])->name('settings');
    Route::put('/', [AccountController::class, 'updatePassword'])->name('updatePassword');
    Route::delete('/Account/delete', [AccountController::class, 'destroy'])->name('destroy');
    
    Route::resource('/formations', FormationController::class);

    Route::prefix('formations/{formation}')->as('formations.')->group(function () {
        Route::resource('/apply', ApplyController::class);
        // Route::get('apply', [ChildController::class, 'index'])->name('formations.child.index');
        // Add more child routes here
    });
});

/* ------------------------  End Company Routes ------------------------ */
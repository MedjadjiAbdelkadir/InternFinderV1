<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\ApplyController;
use App\Http\Controllers\Company\StatusFormation;
use App\Http\Controllers\Company\AccountController;
use App\Http\Controllers\Company\FormationController;
use App\Http\Controllers\Company\EvaluationController;


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
    
    Route::get('{status}/formations',[FormationController::class, 'allFormationWithStatus'])
        ->where('status','open|started|closed|finished')->name('formations.status');

    Route::put('formations/{formation}/update-status', [FormationController::class, 'updateStatus'])->name('formations.update.status');
    Route::resource('/formations', FormationController::class);


    Route::prefix('formations/{formation}')->as('formations.')->group(function () {
        Route::resource('/apply', ApplyController::class);
        // Route::get('apply', [ChildController::class, 'index'])->name('formations.child.index');
        // Add more child routes here
    });

    // Route::get('/getApply/students', GetStudents::class);


    Route::resource('/evaluation', EvaluationController::class);
    // Route::get('evaluation/getApply/students',[EvaluationController::class , 'getStudent']);

});

/* ------------------------  End Company Routes ------------------------ */
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\AccountController;
use App\Http\Controllers\Student\LanguageController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\FormationController;
use App\Http\Controllers\Student\EvaluationController;
use App\Http\Controllers\Student\ExperienceController;
use App\Http\Controllers\Student\StatusFormationController;
use App\Http\Controllers\Student\InstitutesEducationController;
use App\Http\Controllers\Student\UniversitiesEducationController;


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
Route::middleware('auth:student')->group(function(){
    Route::get('/', [AccountController::class, 'show'])->name('index');
    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
    Route::put('/Account/profile', [AccountController::class, 'update'])->name('update');

    Route::get('/Account/settings', [AccountController::class, 'settings'])->name('settings');
    Route::put('/Account/settings', [AccountController::class, 'updatePassword'])->name('updatePassword');
    Route::delete('/Account/delete', [AccountController::class, 'destroy'])->name('destroy');
    
//  Route::get('/edit', [AccountController::class, 'edit'])->name('edit');
    

    Route::resource('education/universities', UniversitiesEducationController::class)->only([
    'store', 'update', 'destroy' 
    ]);

    Route::resource('education/institutes', InstitutesEducationController::class)->only([
        'store', 'update', 'destroy' 
    ]);

    Route::resource('experience', ExperienceController::class)->only([
        'store', 'update', 'destroy'
    ]);
    
    Route::resource('language', LanguageController::class)->only(['store','destroy']);

    Route::resource('/formations', FormationController::class);

    Route::get('{status}/formation', [StatusFormationController::class , 'index'])
        ->where('status','all|registered|acceptable|rejected|readay')->name('formation.index');

    Route::resource('/evaluation', EvaluationController::class);


    Route::get('/dashboard/all/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/dashboard/apply/', [DashboardController::class, 'apply'])->name('dashboard.apply');
    
    // Route::get('/{status}/formation',function($name,$status){
    //     return $status.' Formations';
    // })->where('status','all|acceptable|rejected|readay');
    // Route::resource('/formation/{status}', FormationController::class);
            // ->where(['status'=>'all','status'=>'acceptable','status'=>'rejected' ,'status'=>'readay']);


    // Route::resource('{status}/formation/', FormationController::class)->;

    // Route::get('{status}/formation',function($name,$status){
    //     return $status.' Formations';
    // })->where(['status'=>'accept','status'=>'unacceptable']);
    // Route::prefix('formations/{formation}')->as('formations.')->group(function () {
    //     Route::resource('/apply', ApplyController::class);
    //     // Route::get('apply', [ChildController::class, 'index'])->name('formations.child.index');
    //     // Add more child routes here
    // });
});

/* ------------------------  End Company Routes ------------------------ */


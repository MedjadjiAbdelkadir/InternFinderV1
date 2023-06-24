<?php

use App\Models\Apply;

use App\Models\Formation;
use App\Models\CompanyEvaluation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\ApplyController;
use App\Http\Controllers\Company\StatusFormation;
use App\Http\Controllers\Company\AccountController;
use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\Company\FormationController;
use App\Http\Controllers\Company\EvaluationController;
use App\Http\Controllers\Company\StatusFormationController;

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
    });

    Route::get('{status}/formation', [StatusFormationController::class , 'index'])
    ->where('status','all|registered|acceptable|rejected|readay')->name('formation.status.index');

    Route::resource('/evaluation', EvaluationController::class);

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('dashboard')->as('dashboard.')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/formations',[DashboardController::class, 'getAllFormations'])->name('formations');
        Route::get('/formations/{status}',[DashboardController::class, 'getAllFormationsByStatus'])
                 ->where('status','started|finished|closed|open')->name('formations.status');

                //  company.dashboard.applies.status
        Route::get('/applies',[DashboardController::class, 'getAllApplies'])->name('applies');
        Route::get('/applies/{status}',[DashboardController::class, 'getAllAppliesByStatus'])
               ->where('status','registered|acceptable|rejected|readay')->name('applies.status');

            //    
        // getAllAppliesByStatus
    });
    Route::get('/test/getCompanyByFormations', function(){
        // return Formation::paginate(PAGINATE_COUNT)->count();

    });

});

/* ------------------------  End Company Routes ------------------------ */
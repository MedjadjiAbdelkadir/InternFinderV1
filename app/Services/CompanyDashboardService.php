<?php

namespace App\Services;

use Exception;
use App\Models\Formation;
use App\Models\CompanyEvaluation;
use App\Models\StudentEvaluation;
use App\Interfaces\CompanyDashboardInterface;
use App\Models\Apply;

class CompanyDashboardService implements CompanyDashboardInterface{

    //----------------------------------------------------------------
    # Formations :
    // Get All Formations
    public function getAllFormations(){
        try {
            return Formation::whereCompanyId(auth('company')->id());
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    // Get All Formations By Status 
    public function getAllFormationsByStatus($status){
        try {
            return Formation::whereCompanyId(auth('company')->id())->whereStatus($status);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    //----------------------------------------------------------------
    # Apply :
    // Get All Applies
    public function getAllApplies(){
        try {
            return Apply::with('formations')->whereHas('formations' ,function($query){
                $query->whereCompanyId(auth('company')->id());
            });
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getApplyStatus($status){
        // all|registered|acceptable|rejected|readay
        if($status == 'registered'){
            return 1;
        }elseif($status == 'readay'){
            return 2;
        }elseif($status == 'rejected'){
            return 3;
        }elseif($status == 'acceptable'){
            return 4;
        }else{
            return 0 ;
        }
    }
    // Get All Applies By Status
    public function getAllAppliesByStatus($status){
        try {
            return Apply::with(['formations','students'])->whereHas('formations' ,function($query){
                $query->whereCompanyId(auth('company')->id());
            })->whereStatus($this->getApplyStatus($status));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // ----------------------------------------------------------------
    # Evaluations :
    // Get All Evaluations
    public function getAllEvaluations(){
        try {
            return CompanyEvaluation::with([
                'formations'=>function($query){
                    $query->whereCompanyId(auth('company')->id());
                }
            ]);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

}

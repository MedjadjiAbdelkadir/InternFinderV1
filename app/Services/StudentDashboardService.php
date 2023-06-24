<?php

namespace App\Services;

use Exception;
use App\Models\Formation;
use App\Models\StudentEvaluation;
use App\Interfaces\StudentDashboardInterface;

class StudentDashboardService implements StudentDashboardInterface{


    // Get Get All Formations
    public function getAllFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                ]);
            })->count();

            return $formations;
            // return $formations->count();
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function getRegisteredFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 1]
                ]);
            })->count();

            return $formations;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    
    // Get Get Readay Formations
    public function getReadyFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 2]
                ]);
            })->count();

            return $formations;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // Get Get Rejected Formations
    public function getRejectedFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 3]
                ]);
            })->count();

            return $formations;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // Get Get Acceptable Formations
    public function getAcceptableFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 4]
                ]);
            })->count(); 
            return $formations;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // Get Get Finished Formations
    public function getFinishedFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 4]
                ]);
            })->where('status','finished')->count(); 
            return $formations;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // Get Get Current Formations
    public function getCurrentFormations(){
        try {
            $formations = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',

            ])->whereHas('participants' , function($query){

                $query->where([
                    ['student_id', '=', auth('student')->id()],
                    ['status', '=', 4]
                ]);
            })->where('status','started')->count(); 
            return $formations;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }


    // Get Get All Evaluation
    public function getAllEvaluations(){
        try {

            $evaluations = StudentEvaluation::with(['students','formations'])
            ->where('student_id',auth('student')->id())
            ->count();
            return $evaluations ;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

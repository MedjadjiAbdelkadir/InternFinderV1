<?php

namespace App\Services;

use Exception;

use App\Models\Formation;
use App\Interfaces\StudentFormationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentFormationService implements StudentFormationInterface{
    //  Get All Formation
    public function allFormation($name ,$status) {
        try {
            if($status == 'all' || $status == ''){
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
                })->paginate(PAGINATE_COUNT);
    
            }elseif ($status == 'readay') {
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
                })->paginate(PAGINATE_COUNT);
            }elseif ($status == 'rejected') {
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
                })->paginate(PAGINATE_COUNT);
            }else{
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
                })->paginate(PAGINATE_COUNT);
            }

            return $formations;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    //  Get Formation By Id
    public function show($name, $formation) {
        try {            
            $formation = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',
                'formationUniversityEducations.specialty',
                'formationUniversityEducations.degreeUniversities',
        
                'formationInstituteEducations.degreeInstitutes',


                'formationExperiences.durations',
                'formationLanguages.languages',
                'formationLanguages.levels'
            ])->whereHas('participants' , function($query){
                $query->where(
                    'student_id' ,'=', auth('student')->id()
                );
            })->findOrFail($formation);

            return $formation;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    //  Create Formation
    public function store($request ,$name) {
        try {
            # Code 
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    

    //  Delete Formation
    public function destroy($name, $formation){
        try {
            $formation = Formation::with([
                'participants' => function ($q){
                    $q->where('student_id', auth('student')->id())->first();
                },
                'municipals.states',
                'company',
                'formationUniversityEducations.specialty',
                'formationUniversityEducations.degreeUniversities',
        
                'formationInstituteEducations.degreeInstitutes',

                'formationSchoolEducations.specialty',
                'formationSchoolEducations.degreeSchools',

                'formationExperiences.durations',
                'formationLanguages.languages',
                'formationLanguages.levels'
            ])->whereHas('participants' , function($query){
                $query->where(
                    'student_id' ,'=', auth('student')->id()
                );
            })->findOrFail($formation);

            $formation->participants()->delete();
            return auth('student')->user()->full_name;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

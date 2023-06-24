<?php

namespace App\Services;

use Exception;

use App\Models\Apply;
use App\Models\Formation;
use App\Interfaces\StudentFormationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentFormationService implements StudentFormationInterface{
    //  Get All Formation
    public function allFormation($name ,$status) {
        try {
            $applies = Apply::with(['formations','students'])
                            ->whereHas('formations',function($query){
                                $query->where('student_id', '=', auth('student')->id());
                            })->where('student_id', auth('student')->id())
                            ->paginate(PAGINATE_COUNT);
            return $applies;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function allWithStatusFormation($name ,$status){
        try {            
            if($status == 'all' || $status == ''){
                $applies = Apply::with(['formations','students'])
                ->whereHas('formations',function($query){
                    // $query->where('student_id', '=', auth('student')->id());
                })->where('student_id', auth('student')->id())
                ->paginate(PAGINATE_COUNT);
    
            }elseif ($status == 'registered'){
                $applies = Apply::with(['formations','students'])
                ->whereHas('formations',function($query){
                    // $query->where('student_id', '=', auth('student')->id());
                })->where('student_id', auth('student')->id())
                ->where('status', 1)
                ->paginate(PAGINATE_COUNT);
            }
            elseif ($status == 'readay') {
                $applies = Apply::with(['formations','students'])
                ->whereHas('formations',function($query){
                    // $query->where('student_id', '=', auth('student')->id());
                })->where('student_id', auth('student')->id())
                ->where('status', 2)
                ->paginate(PAGINATE_COUNT);
            }elseif ($status == 'rejected') {
                $applies = Apply::with(['formations','students'])
                ->whereHas('formations',function($query){
                    // $query->where('student_id', '=', auth('student')->id());
                })->where('student_id', auth('student')->id())
                ->where('status', 3)
                ->paginate(PAGINATE_COUNT);
            }else{
                $applies = Apply::with(['formations','students'])
                ->whereHas('formations',function($query){
                    // $query->where('student_id', '=', auth('student')->id());
                })->where('student_id', auth('student')->id())
                ->where('status', 4)
                ->paginate(PAGINATE_COUNT);
            }



          return $applies;

      

            // return $formations;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
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

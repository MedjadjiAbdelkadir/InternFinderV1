<?php

namespace App\Services;

use Exception;
use App\Models\Job;
use App\Models\State;
use App\Models\Student;
use App\Models\Municipal;
use App\Models\University;
use App\Models\DegreeSchool;
use App\Models\ListLanguage;
use App\Models\LevelLanguage;
use App\Models\DegreeInstitute;
use App\Models\SpecialtySchool;
use App\Models\DegreeUniversity;
use App\Models\DurationExperience;
use App\Models\SpecialtyUniversity;
use App\Interfaces\AccountStudentInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//  implements AccountStudentInterface
class AccountStudentService implements AccountStudentInterface{

    public function show($name){
        try{
            $municipals = Municipal::where('state_id', auth('student')->user()->municipals->state_id)->get();
            $states = State::get();
            $list_languages  = ListLanguage::get();
            $level_languages = LevelLanguage::get(); 
    
            $degree_universities = DegreeUniversity::get();
            $universities = University::get();
            $specialty_universities =SpecialtyUniversity::get();
            $degree_institutes = DegreeInstitute::get();
    

            $durationExperiences = DurationExperience::get();
            $jobs  = Job::get();
            
            return [
                'municipals' => $municipals,
                'states'     => $states,
                'degree_universities'   => $degree_universities,
                'universities'          => $universities,
                'specialty_universities'=> $specialty_universities,
                'degree_institutes'     => $degree_institutes,
                'durationExperiences'   => $durationExperiences,
                'jobs'                  => $jobs,

                'list_languages'=> $list_languages , 
                'level_languages'=> $level_languages ,
            ];
          
         
        }catch (ModelNotFoundException $e) {

            throw new Exception('Student not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    public function update($request , $full_name){
        try {
            $student = Student::findOrFail(auth('student')->id());
            $student->update([
                'first_name' => $request->first_name ,
                'last_name'  => $request->last_name ,
                'phone'        => $request->phone ,
                'municipal_id' => $request->municipal,
                'dateBirth' => $request->dateBirth,
                'gender'     => $request->gender, 
            ]);
            return $student->full_name ;
            
        }catch (ModelNotFoundException $e) {

            throw new Exception('Student not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function updatePassword($request){
        try {
            // Code 
        }catch (ModelNotFoundException $e) {

            throw new Exception('Student not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function destroy($name){
        try {
            $student = Student::findOrFail(auth('student')->id());
            $student->delete() ;
        }catch (ModelNotFoundException $e) {

            throw new Exception('Student Not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

<?php

namespace App\Services;
use DB;

use Exception;
use App\Models\State;
use App\Models\Formation;
use App\Models\Municipal;
use App\Models\DegreeSchool;
use App\Models\ListLanguage;
use App\Models\LevelLanguage;
use App\Models\DegreeInstitute;
use App\Models\SpecialtySchool;
use App\Models\DegreeUniversity;
use App\Models\FormationLanguage;
use App\Models\DurationExperience;
use App\Models\FormationExperience;
use App\Models\SpecialtyUniversity;

use App\Models\FormationEducationSchool;
use App\Models\FormationEducationInstitute;
use App\Models\FormationEducationUniversity;
use App\Interfaces\CompanyFormationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyFormationService implements CompanyFormationInterface{

    public function allFormation(){
        try {
            //code...
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        } 
    }

    public function allFormationWithStatus($name , $status){
        try {
            $formations = Formation::whereStatus($status)->where('company_id',auth('company')->id())->with([
                'company',
                'formationUniversityEducations.specialty',
                'formationUniversityEducations.degreeUniversities',
        
                'formationInstituteEducations.degreeInstitutes',    
                'formationExperiences.durations',
                'formationLanguages.languages',
                'formationLanguages.levels'
            ])->paginate(PAGINATE_COUNT);

            return $formations;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        } 
    }


    public function getFormationById($id){
        try {
            //code...
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function store($request){
        // DB::beginTransaction();
        try {
            $formation = Formation::create([
                'title'        => $request->title ,
                'nbr_place'    => $request->nbr_place ,
                'permanence'   => $request->permanence,
                'start'        => $request->start ,
                'end'          => $request->end ,
                'description'  => $request->description ,
                'municipal_id' => $request->municipal ,

                'company_id'   => auth('company')->id(),
            ]);

            if(!empty($request->specialty_university)){
                for($i=0 ; $i< count($request->specialty_university); $i++){
                    FormationEducationUniversity::create([
                        'specialty_id' => $request->specialty_university[$i] ,
                        'degree_id'    => $request->degree_university[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            if(!empty($request->degree_institute)){
                for($i=0 ; $i< count($request->specialty_institute); $i++){
                    FormationEducationInstitute::create([
                        'name' => $request->specialty_institute[$i],
                        'degree_id' => $request->degree_institute[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            if(!empty($request->duration_experience)){
                for($i=0 ; $i< count($request->specialty_experience); $i++){
                    FormationExperience::create([
                        'specialty' => $request->specialty_experience[$i],
                        'duration_id'    =>$request->duration_experience[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }
            if(!empty($request->language_name)){
                for($i=0 ; $i< count($request->language_name); $i++){
                    FormationLanguage::create([
                        'language_id' => $request->language_name[$i],
                        'level_id'    =>$request->language_level[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            return auth('company')->user()->name ;
            // DB::commit();
        }catch (Exception $e) {
            // DB::rollback();
            throw new Exception('Internal Server Error');

        }
    }

    public function show($id){
        try {
            //code...
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function edit($id){
        try {

            $states = State::get();
            $municipals = Municipal::get();
            $specialty_universities =SpecialtyUniversity::get();
            $degree_universities = DegreeUniversity::get();
            $degree_institutes = DegreeInstitute::get();
            $durationExperiences = DurationExperience::get();
            $list_languages  = ListLanguage::get();
            $level_languages = LevelLanguage::get(); 
    
            $formation = Formation::with([
                'municipals',
                'company',
                'participants.students',

                'formationUniversityEducations.specialty',
                'formationUniversityEducations.degreeUniversities',
        
                'formationInstituteEducations.degreeInstitutes',
                'formationExperiences.durations',
                'formationLanguages.languages',
                'formationLanguages.levels'
            ])->find($id);
            // dd( $formation->participants );

            $municipals = Municipal::where('state_id', $formation->municipals->state_id)->get();
    
           return [
            'formation' => $formation ,
            'states'    =>$states ,
            'municipals'=>$municipals ,
            'specialty_universities'=> $specialty_universities ,
            'degree_universities'=> $degree_universities ,
            'degree_institutes' => $degree_institutes ,
            'durationExperiences'=> $durationExperiences ,
            'list_languages'=> $list_languages , 
            'level_languages'=> $level_languages ,
           ] ;

        }catch (ModelNotFoundException $e) {

            throw new Exception('Formation not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    public function update($request , $id){
        DB::beginTransaction();
        try {
            $formation = Formation::findOrFail($id);
            foreach($formation->formationUniversityEducations as $universityEducations){
                echo $universityEducations-> delete();
            }
            foreach($formation->formationInstituteEducations as $instituteEducations){
                echo $instituteEducations-> delete();
            }

            foreach($formation->formationExperiences as $experience){
                echo $experience-> delete();
            }
            foreach($formation->formationLanguages as $formationLanguages){
                echo $formationLanguages-> delete();
            }
            $formation->update([
                'title'        => $request->title ,
                'nbr_place'    => $request->nbr_place ,
                'permanence'   => $request->permanence,
                'start'        => $request->start ,
                'end'          => $request->end ,
                'description'  => $request->description ,
                'municipal_id' => $request->municipal ,
            ]);

            if(!empty($request->specialty_university)){
                for($i=0 ; $i< count($request->specialty_university); $i++){
                    FormationEducationUniversity::create([
                        'specialty_id' => $request->specialty_university[$i] ,
                        'degree_id'    => $request->degree_university[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            if(!empty($request->degree_institute)){
                for($i=0 ; $i< count($request->specialty_institute); $i++){
                    FormationEducationInstitute::create([
                        'name' => $request->specialty_institute[$i],
                        'degree_id' => $request->degree_institute[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            if(!empty($request->duration_experience)){
                for($i=0 ; $i< count($request->specialty_experience); $i++){
                    FormationExperience::create([
                        'specialty' => $request->specialty_experience[$i],
                        'duration_id'    =>$request->duration_experience[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }
            if(!empty($request->language_name)){
                for($i=0 ; $i< count($request->language_name); $i++){
                    FormationLanguage::create([
                        'language_id' => $request->language_name[$i],
                        'level_id'    =>$request->language_level[$i],
                        'formation_id' => $formation-> id,
                    ]);
                }
            }

            DB::commit();
            return auth('company')->user()->name ;
            
        }catch (ModelNotFoundException $e) {

            throw new Exception('Education not found', 404);

        }catch (Exception $e) {
            DB::rollback();
            throw new Exception('Internal Server Error');

        }
    }


    public function updateStatus($request,$name, $id){
        try {

            $formation = Formation::findOrFail($id);            
            $formation->update([
                'status' => $request->status ,
            ]);

            return auth('company')->user()->name ;
            
        }catch (ModelNotFoundException $e) {

            throw new Exception('Formation not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
 
    
    public function destroy($id){
        try {

            $formation = Formation::findOrFail($id);
            
            $formation->delete() ;
            return auth('company')->user()->name;
        }catch (ModelNotFoundException $e) {

            throw new Exception('Formation not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

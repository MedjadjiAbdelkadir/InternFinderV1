<?php

namespace App\Http\Controllers\Company;


use App\Models\State;
use App\Models\Formation;
use App\Models\Municipal;
use App\Models\DegreeSchool;
use App\Models\ListLanguage;
use Illuminate\Http\Request;
use App\Models\LevelLanguage;
use App\Models\DegreeInstitute;
use App\Models\SpecialtySchool;
use App\Models\DegreeUniversity;
use App\Models\DurationExperience;
use App\Models\SpecialtyUniversity;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFormationRequest;
use App\Interfaces\CompanyFormationInterface;

class FormationController extends Controller{
    
    protected $formationService ;
    public function __construct(CompanyFormationInterface $formationService){
        $this->formationService = $formationService;
    }

    public function index($name){
    //  dd(auth('company')->id());
        $formations = Formation::where('company_id',auth('company')->id())->with([
            'company',
            'formationUniversityEducations.specialty',
            'formationUniversityEducations.degreeUniversities',
    
            'formationInstituteEducations.degreeInstitutes',    
            'formationExperiences.durations',
            'formationLanguages.languages',
            'formationLanguages.levels'
        ])->paginate(PAGINATE_COUNT);
        // paginate(PAGINATE_COUNT)
      
        return view('pages.company.formation.index' ,compact('formations'));
    }

    public function create(){
        $states = State::get();
        $specialty_universities =SpecialtyUniversity::get();
        $degree_universities = DegreeUniversity::get();
        
        $degree_institutes = DegreeInstitute::get();

        $durationExperiences = DurationExperience::get();
        
        $list_languages  = ListLanguage::get();
        $level_languages = LevelLanguage::get(); 
        
     
        return view('pages.company.formation.create',compact([
            'states' ,
            'specialty_universities','degree_universities',
            'degree_institutes' ,
            'durationExperiences',
            'list_languages' , 'level_languages'
        ]));
    }

    // public function store(CreateFormationRequest $request , $name)
    public function store(Request $request , $name){
        try {

            $this->formationService->store($request);
            return redirect()->route('company.formations.index',$name)
            // return redirect()->back()
                   ->with(['success'=>'Success Created Formation']); 
            
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function show($name, $formation){
        try {

            $data = $this->formationService->edit($formation);
            
            $formation = $data['formation'];
            $formation =  $data['formation'] ;
            $states    = $data['states'] ;
            $municipals= $data['municipals'] ;
            $specialty_universities=  $data['specialty_universities'] ;
            $degree_universities=  $data['degree_universities'] ;
            $degree_institutes =  $data['degree_institutes'] ;
            $durationExperiences=  $data['durationExperiences'] ;
            $list_languages=  $data['list_languages'] ; 
            $level_languages=  $data['level_languages'] ;

            return view('pages.company.formation.single',compact([
                'formation',
                'states' ,
                'municipals',
                'specialty_universities','degree_universities',
                'degree_institutes' ,
                'durationExperiences',
                'list_languages' , 'level_languages'
            ]));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    
    public function edit($name,$id){
        try {

            $data = $this->formationService->edit($id);
            $formation = $data['formation'];
            $formation =  $data['formation'] ;
            $states    = $data['states'] ;
            $municipals= $data['municipals'] ;
            $specialty_universities=  $data['specialty_universities'] ;
            $degree_universities=  $data['degree_universities'] ;
            $degree_institutes =  $data['degree_institutes'] ;
            $durationExperiences=  $data['durationExperiences'] ;
            $list_languages=  $data['list_languages'] ; 
            $level_languages=  $data['level_languages'] ;

            return view('pages.company.formation.edit',compact([
                'formation',
                'states' ,
                'municipals',
                'specialty_universities','degree_universities',
                'degree_institutes' ,
                'durationExperiences',
                'list_languages' , 'level_languages'
            ]));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function update(Request $request,$name, $id){
        
        try{
            $name = $this->formationService->update($request,$id);
            return redirect()->route('company.formations.index',$name);
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');
        }   
    }

    public function updateStatus(Request $request,$name, $id){
        try{
            // return $this->formationService->updateStatus($request,$name, $id);
            $name = $this->formationService->updateStatus($request,$name, $id);
             return redirect()->route('company.formations.index',$name);
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');
        } 
    }

    public function allFormationWithStatus($name , $status){
        try{
            // return 'Formation : '.$status  ;
            $formations = $this->formationService->allFormationWithStatus($name , $status);

            return view('pages.company.formation.formation-with-status' ,compact(['formations','status']));
            return $name ;
            // formation-with-status
            // return redirect()->route('company.formations.index',$name);
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');
        } 
    }


    public function destroy($name,$id){
        try{
            $name = $this->formationService->destroy($id);
            return redirect()->route('company.formations.index',$name);
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');
        }        
    }
}

<?php

namespace App\Services;

use Exception;
use App\Models\Company;
use App\Models\Formation;
use App\Models\Municipal;
use App\Interfaces\HomeInterface;

class HomeService implements HomeInterface{
    public function index(){
        try {
            $companies = Company::all()->take(16);
            $formations = Formation::all()->take(9);
            return[

               'companies' => $companies,
               'formations' => $formations
            ];
            // Code
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllFormations(){
        try {
            return Formation::paginate(14);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllFormationsByCompany($company){
        try {
            // return 'getAllFormationsByCompany';
            return Company::with('formations')->find($company);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllCompanies(){
        try {
            return Company::paginate(14);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function getFormationsById($formation) {
        try {            
            $formation = Formation::with([
                'municipals.states',
                'company',
                'formationUniversityEducations.specialty',
                'formationUniversityEducations.degreeUniversities',
        
                'formationInstituteEducations.degreeInstitutes',
                'formationExperiences.durations',
                'formationLanguages.languages',
                'formationLanguages.levels'
            ])->findOrFail($formation);

            return $formation;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Formation Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function searchFormations($request){
        try {
            // return $request->title;

            $place     = $request->place;
            $municipal = Municipal::where('name', 'like', '%' . $place . '%')->first();
            $title     =$request->title;

            return Formation::with('company')->whereHas('company', function ($q) use ($title) {
                $q->where('name', '=', $title);
            })->orWhere('title', 'LIKE', '%'.$title.'%')
              ->orWhere('municipal_id', 'LIKE', '%'.$municipal->id.'%')
              ->paginate(10);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

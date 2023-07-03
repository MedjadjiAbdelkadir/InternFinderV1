<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Interfaces\HomeInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

    protected $homeService ;
    public function __construct(HomeInterface $homeService){
        $this->homeService = $homeService;
    }
    public function index(){
        try{
            $data =  $this->homeService->index();
            $companies  =  $data['companies'];
            $formations = $data['formations'];
            return view('index' ,compact('companies','formations'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllFormations(){
        try{
            $formations =  $this->homeService->getAllFormations();
            return view('formations' ,compact('formations'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }

    }
    public function getAllFormationsByCompany($company){
        try{
            $company = $this->homeService->getAllFormationsByCompany($company);
            // $formations =  $this->homeService->getAllFormationsByCompany($company);
            return view('company' ,compact('company'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getFormationsById($formation){
        try{
            $formation =  $this->homeService->getFormationsById($formation);
            return view('single-formation' ,compact('formation'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllCompanies(){
        try{
            $companies =  $this->homeService->getAllCompanies();
            return view('companies' ,compact('companies'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }


    public function searchFormations(Request $request){
        try{
            $formations  = $this->homeService->searchFormations($request);

            return view('result-searchFormations' , compact('formations'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
       
        // $formations = $this->homeService->searchFormations($request);
    }
}

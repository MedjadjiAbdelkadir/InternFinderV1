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
        $data =  $this->homeService->index();
        $companies  =  $data['companies'];
        $formations = $data['formations'];
        // {$companies } = $data[];
        // return $companies;
        return view('index' ,compact('companies','formations'));
    }
    public function getAllFormations(){
        $formations =  $this->homeService->getAllFormations();

        return view('formations' ,compact('formations'));
    }
    public function getAllCompanies(){
        // getAllCompanies
        $companies =  $this->homeService->getAllCompanies();
        return view('companies' ,compact('companies'));
        
    }


    public function searchFormations(Request $request){
        // tr
        return $this->homeService->searchFormations($request);
        // $formations = $this->homeService->searchFormations($request);
    }
}

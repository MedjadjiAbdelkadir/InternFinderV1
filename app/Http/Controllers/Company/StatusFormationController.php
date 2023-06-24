<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CompanyFormationInterface;


class StatusFormationController extends Controller
{

    protected $formationService ;
    public function __construct(CompanyFormationInterface $formationService){
        $this->formationService = $formationService;
    }
    public function index($name , $status){

        
        $formations = $this->formationService->allWithStatusFormation($name,$status);

        return view('pages.company.dashboard.formations', compact('formations'));
    }

}

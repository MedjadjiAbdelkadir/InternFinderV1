<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\StudentFormationInterface;

class StatusFormationController extends Controller
{

    protected $formationService ;
    public function __construct(StudentFormationInterface $formationService){
        $this->formationService = $formationService;
    }
    public function index($name , $status){
        $applies = $this->formationService->allWithStatusFormation($name,$status);

        // return response($applies);
        return view('pages.student.formation.index', compact('applies'));
    }

}

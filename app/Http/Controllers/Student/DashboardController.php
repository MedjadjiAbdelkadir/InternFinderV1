<?php

namespace App\Http\Controllers\Student;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\StudentDashboardInterface;

class DashboardController extends Controller
{
    protected $dashboardService ;

    public function __construct(StudentDashboardInterface $dashboardService){
        $this->dashboardService = $dashboardService;
        // $this->middleware('auth:student');
    }

    public function index(){
        try {
            $allFormations = $this->dashboardService->getAllFormations();
            $registeredFormations = $this->dashboardService->getRegisteredFormations();
            $acceptFormations = $this->dashboardService->getAcceptableFormations();
            $readyFormations = $this->dashboardService->getReadyFormations();
            $rejectedFormations = $this->dashboardService->getRejectedFormations();

            $currentFormations = $this->dashboardService->getCurrentFormations();
            $finishedFormations = $this->dashboardService->getFinishedFormations();

            $evaluations = $this->dashboardService->getAllEvaluations();
            // return response()->json([
            //     'allFormations' => $allFormations,
            //     'registeredFormations' => $registeredFormations,
            //     'acceptFormations' => $acceptFormations,
            //     'readyFormations' => $readyFormations,
            //     'rejectedFormations' => $rejectedFormations,
            // ]);
            return view('pages.student.dashboard.index', compact(
                'allFormations','registeredFormations','acceptFormations','readyFormations','rejectedFormations','currentFormations', 'finishedFormations',
                'evaluations'

            ));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function getAllFormations(){
        try {
            $formations = $this->dashboardService->getAllFormations();
            $evaluations = $this->dashboardService->getAllEvaluations();


           
            // return $formations->count();
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
  
    }
}

<?php

namespace App\Http\Controllers\Company;

use Exception;
use App\Http\Controllers\Controller;
use App\Interfaces\CompanyDashboardInterface;


class DashboardController extends Controller
{
    protected $dashboardService ;

    public function __construct(CompanyDashboardInterface $dashboardService){
        $this->dashboardService = $dashboardService;
        // $this->middleware('auth:student');
    }

    public function index(){
        try {

            # Formations
            $allFormations       = $this->dashboardService->getAllFormations()->count();
            $openFormations      = $this->dashboardService->getAllFormationsByStatus('open')->count();
            $closeFormations     = $this->dashboardService->getAllFormationsByStatus('close')->count();
            $currentFormations   = $this->dashboardService->getAllFormationsByStatus('started')->count();
            $finishedFormations  = $this->dashboardService->getAllFormationsByStatus('finished')->count();
            
            # Apply Formations
            $allApplies = $this->dashboardService->getAllApplies()->count();
            // $allApplies = $this->dashboardService->getAllAppliesByStatus('registered');
           // registered|acceptable|rejected|readay
            $registeredApplies = $this->dashboardService->getAllAppliesByStatus('registered')->count();
            $acceptApplies = $this->dashboardService->getAllAppliesByStatus('acceptable')->count();
            $readyApplies = $this->dashboardService->getAllAppliesByStatus('readay')->count();
            $rejectedApplies = $this->dashboardService->getAllAppliesByStatus('rejected')->count();

            // return response($acceptFormations);

            $allEvaluations = $this->dashboardService->getAllEvaluations();
            // return response()->json([
            //     'allFormations' => $allFormations->count(),
            //     '--------------------------',
            //     'registeredApplies' => $registeredApplies->count(),
            //     'acceptApplies' => $acceptApplies->count(),
            //     'readyApplies' => $readyApplies->count(),
            //     'rejectedApplies' => $rejectedApplies->count(),
            //     '--------------------------',
            //     '$openFormations'   => $openFormations->count(),
            //     'closeFormations' => $closeFormations->count(),
            //     'currentFormations' => $currentFormations->count(),
            //     'finishedFormations' =>$finishedFormations->count(),
            //     '--------------------------',
            //     'allEvaluations'      =>$allEvaluations->count(),
            // ]);
            return view('pages.company.dashboard.index', compact(
                'allFormations','openFormations','closeFormations','currentFormations', 'finishedFormations',
                'allApplies','registeredApplies','acceptApplies','readyApplies','rejectedApplies',
   
                'allEvaluations'
            ));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function getAllFormations(){
        try {
            $formations = $this->dashboardService->getAllFormations()->paginate(PAGINATE_COUNT);
            return view('pages.company.dashboard.formations', compact('formations'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllFormationsByStatus($name ,$status){
        try {
            $formations = $this->dashboardService->getAllFormationsByStatus($status)->paginate(PAGINATE_COUNT);
            return view('pages.company.dashboard.formations', compact('formations','status'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllApplies(){
        try {
            $applies = $this->dashboardService->getAllApplies()->paginate(PAGINATE_COUNT);
            return view('pages.company.dashboard.applies', compact('applies'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllAppliesByStatus($name , $status){
        try {
            $applies = $this->dashboardService->getAllAppliesByStatus($status)->paginate(PAGINATE_COUNT);
            return view('pages.company.dashboard.applies', compact('applies','status'));
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}


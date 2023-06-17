<?php

namespace App\Http\Controllers\Company;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CompanyEvaluationInterface;

class EvaluationController extends Controller{

    protected $evaluationService ;

    public function __construct(CompanyEvaluationInterface $evaluationService){
        $this->evaluationService = $evaluationService;
    }

    public function index($name){
        try {
            $evaluations = $this->evaluationService->allEvaluation(); 
            return view('pages.company.evaluation.index', compact('evaluations')); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function create($name){
        try {
            $formations =  $this->evaluationService->create();
            return view('pages.company.evaluation.create' , compact('formations')); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function store(Request $request ,$name ){
        try {
            $name = $this->evaluationService->store($request); 
            return redirect()->route('company.evaluation.index',$name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        } 

    }

    public function show($name ,$id){
        try {
            $evaluation =  $this->evaluationService->show($id);
            return view('pages.company.evaluation.single' , compact('evaluation')); 
            // return $this->evaluationService->show($id);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        } 
    }

    public function edit($name ,$id){
        try {
            $evaluation =  $this->evaluationService->show($id);
            return view('pages.company.evaluation.edit' , compact('evaluation')); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function update(Request $request,$name , $id){
        try {
            $name = $this->evaluationService->update($request , $id); 
            return redirect()->route('company.evaluation.index' , $name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($name ,$id){
        try {
            $this->evaluationService->destroy($id);
            return redirect()->route('company.evaluation.index'); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

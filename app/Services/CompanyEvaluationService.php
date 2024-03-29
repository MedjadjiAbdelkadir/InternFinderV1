<?php

namespace App\Services;

use Exception;
use App\Models\CompanyEvaluation;
use App\Interfaces\CompanyEvaluationInterface;
use App\Models\Apply;
use App\Models\Formation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyEvaluationService implements CompanyEvaluationInterface{

    public function allEvaluation(){
        try {
            $evaluations = CompanyEvaluation::with(['students','formations'=>function($q){
            }])->whereRelation('formations','company_id', '=', auth('company')->id())->paginate(PAGINATE_COUNT);
            return $evaluations ;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }

    }

    public function create(){
        try {
           return Formation::where('company_id',auth('company')->id())
                           ->where('status', 'finished')
                           ->get();
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function show($id){
        try {
            $evaluation = CompanyEvaluation::with(['students','formations'])->findOrFail($id);
            return $evaluation;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function edit($id){
        
        try {
            $evaluation = CompanyEvaluation::findOrFail($id);
            // return 'edit'.$id; 
            return $evaluation;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }


    public function store($request) {
        
        try {
            $apply_id = Apply::select('id')->where('student_id', $request->student_id)
            ->where('formation_id', $request->formation_id)
            ->first();
            CompanyEvaluation::create([
            'apply_id'           => $apply_id->id,
            'time'               => $request->time,
            'rules_conditions'   => $request->rules_conditions,
            'development'        => $request->development,
            'team'               => $request->team,
            'remark'             => $request->remark,
            'formation_id'      => $request->formation_id,
            'student_id'        => $request->student_id,
            ]);
            return auth('company')->user()->name;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }

    }

    public function update($request ,$id) {
        
        try {
            $evaluation = CompanyEvaluation::findOrFail($id);
            $evaluation->update([
                'time'               => $request->time,
                'rules_conditions'   => $request->rules_conditions,
                'development'        => $request->development,
                'team'               => $request->team,
                'remark'             => $request->remark,
            ]);
            return auth('company')->user()->name;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($id) {
        
        try {
            $evaluation = CompanyEvaluation::findOrFail($id);
            $evaluation->delete();
            return auth('company')->user()->name;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

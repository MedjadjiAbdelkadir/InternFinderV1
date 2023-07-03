<?php

namespace App\Services;

use Exception;
use App\Models\Apply;
use App\Models\Formation;
use App\Models\StudentEvaluation;
use App\Interfaces\StudentEvaluationInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentEvaluationService implements StudentEvaluationInterface{

    public function allEvaluation(){
        try {
            $evaluations = StudentEvaluation::with(['students','formations'])->where('student_id', auth('student')->id())
            ->paginate(PAGINATE_COUNT);
            return $evaluations ;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }

    }

    public function create(){
        try {
            $applies = Apply::with(['students','formations'])
                        ->whereRelation('formations','student_id', '=', auth('student')->id())
                        ->get();
            foreach($applies as $apply){
                $formations[] = $apply->formations;
            }
            return $formations;

        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function show($id){
        try {
            $evaluation = StudentEvaluation::with(['students','formations.company'])->findOrFail($id);
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
            $apply_id = Apply::select('id')->where('formation_id', $request->formation_id)
            ->where('student_id', auth('student')->id())
            ->first();
            StudentEvaluation::create([
                'apply_id'           => $apply_id->id,
                'time'               => $request->time,
                'rules_conditions'   => $request->rules_conditions,
                'environment'        => $request->environment,
                'content'            => $request->content,
                'remark'             => $request->remark,
                'formation_id'      => $request->formation_id,
                'student_id'        => auth('student')->id(),
            ]);
            return auth('student')->user()->full_name;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }

    }

    public function update($request ,$id) {
        
        try {
            $evaluation = StudentEvaluation::findOrFail($id);
            $evaluation->update([
                'time'               => $request->time,
                'rules_conditions'   => $request->rules_conditions,
                'environment'        => $request->environment,
                'content'            => $request->content,
                'remark'             => $request->remark,
            ]);
            return auth('student')->user()->full_name;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($id) {
        
        try {
            $evaluation = StudentEvaluation::findOrFail($id);
            $evaluation->delete();
            return auth('student')->user()->full_name;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Evaluation Not Found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

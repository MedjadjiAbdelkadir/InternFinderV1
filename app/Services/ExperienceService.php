<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use App\Interfaces\ExperienceInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExperienceService implements ExperienceInterface{
    
    public function store($request){
        try {

            $id = auth('student')->id();
            Experience::create([
                'job_id'=>$request->job,
                'specialty'=>$request->specialty,
                'company'=>$request->company,
                'description'=>$request->description,
                'duration_id'=>$request->duration,
                'student_id'  => $id ,
            ]);
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    public function update($request , $id){
        try {

        }catch (ModelNotFoundException $e) {

            throw new Exception('Experience Not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
 
    
    public function destroy($id){
        try {

            $experience = Experience::findOrFail($id);
            $experience->delete() ;

        }catch (ModelNotFoundException $e) {

            throw new Exception('Experience Not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

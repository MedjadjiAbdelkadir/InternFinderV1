<?php

namespace App\Services\Education;

use App\Interfaces\Education\SchoolInterface;
use App\Models\EducationSchool;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SchoolService implements SchoolInterface{
    public function store($request){
        try {
            $id = auth('student')->id() ;
            EducationSchool::create([
                'name'         => $request->name ,
                'description'  => $request->description ,
                'start'        => $request->start ,
                'end'          => $request->end ,
                'student_id'   => $id ,
                'specialty_id' => $request->specialty ,
                'degree_id'    => $request->degree ,
            ]);    
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function store

    public function update($request ,$id){
        try {
            $educationUSchool= EducationSchool::findOrFail($id);
            $educationUSchool->update([
                'name'         => $request->name ,
                'description'  => $request->description ,
                'start'        => $request->start ,
                'end'          => $request->end ,
                'specialty_id' => $request->specialty ,
                'degree_id'    => $request->degree ,
            ]);

        }catch (ModelNotFoundException $e) {
            throw new Exception('Education School Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function update

    public function destroy($id){
        try {
            $educationUSchool= EducationSchool::findOrFail($id);
            $educationUSchool->delete();       
        }catch (ModelNotFoundException $e) {
            throw new Exception('Education School Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function destroy
}

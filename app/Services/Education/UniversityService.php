<?php

namespace App\Services\Education;

use App\Interfaces\Education\UniversityInterface;
use App\Models\EducationUniversity;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UniversityService implements UniversityInterface{
    public function store($request){
        try {
            $id = auth('student')->id() ;
            EducationUniversity::create([
                'description'    => $request->description ,
                'start'          => $request->start ,
                'end'            => $request->end ,
                'student_id'     => $id,
                'university_id'  => $request->university ,
                'specialty_id'   => $request->specialty ,
                'degree_id'      => $request->degree ,
            ]);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function store

    public function update($request ,$id){

        try {
            $educationUniversity= EducationUniversity::findOrFail($id);
            $educationUniversity->update([
                'description'    => $request->description ,
                'start'          => $request->start ,
                'end'            => $request->end ,
                'university_id'  => $request->university ,
                'specialty_id'   => $request->specialty ,
                'degree_id'      => $request->degree ,
            ]); 
        }catch (ModelNotFoundException $e) {
            throw new Exception('Education University not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function update

    public function destroy($id){
        try {
            $educationUniversity= EducationUniversity::findOrFail($id);
            $educationUniversity->delete();     
        }catch (ModelNotFoundException $e) {
            throw new Exception('Education University Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function destroy
}

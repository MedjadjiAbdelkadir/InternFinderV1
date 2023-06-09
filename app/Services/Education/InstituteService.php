<?php

namespace App\Services\Education;

use Exception;
use App\Interfaces\Education\InstituteInterface;
use App\Models\EducationInstitute;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InstituteService implements InstituteInterface{

    public function store($request){
        try {
            $id = auth('student')->id() ;
            EducationInstitute::create([
                'name'          => $request->name ,
                'specialty'     => $request->specialty ,
                'description'   => $request->description ,
                'start'         => $request->start , 
                'end'           => $request->end ,
                'student_id'    => $id ,
                'degree_id'     => $request->degree,
            ]) ;    
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function store

    public function update($request ,$id){
        
        try {
            $educationInstitute = EducationInstitute::findOrFail($id);
            
            $educationInstitute->update([
                'name'          => $request->name ,
                'specialty'     => $request->specialty ,
                'description'   => $request->description ,
                'start'         => $request->start , 
                'end'           => $request->end ,
                'degree_id'     => $request->degree,
            ]) ;  
        }catch (ModelNotFoundException $e) {
            throw new Exception('Cv Description not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function update

    public function destroy($id){
        try {
            $educationInstitute = EducationInstitute::findOrFail($id);
            $educationInstitute->delete() ;       
        }catch (ModelNotFoundException $e) {
            throw new Exception('Cv Description not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    } // End function destroy
}

<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Interfaces\EducationInterface;

use Illuminate\Http\Request;
use Exception;

class EducationController extends Controller{
    protected $educationService ;

    public function __construct(EducationInterface $educationService){
        $this->educationService = $educationService;
    }

    public function store(Request $request , $full_name){
        try { 
            $this->educationService->store($request , $full_name);
            return redirect()->back()
                   ->with('success','Success Create Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    public function update(Request $request ,$full_name , $id){
        
        try {              
            $this->educationService->update($request ,$full_name , $id);
            return redirect()->back()->with('success','Success Update Education');
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function destroy($full_name ,$id ){

        try {
            $this->educationService->destroy($full_name , $id);
            return redirect()->back()->with('success','Success Delete Education'); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

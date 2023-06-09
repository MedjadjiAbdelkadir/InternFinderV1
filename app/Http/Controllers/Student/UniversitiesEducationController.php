<?php

namespace App\Http\Controllers\Student;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Education\UniversityInterface;

class UniversitiesEducationController extends Controller{
    protected $universityService ;
    public function __construct(UniversityInterface $universityService){
        $this->universityService = $universityService;
    }

    public function store(Request $request){
        try { 
            $this->universityService->store($request);
            return redirect()->back()
                   ->with('success','Success Create University Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function update(Request $request,$full_name, $id){

        try { 
            $this->universityService->update($request , $id);
            return redirect()->back()
                   ->with('success','Success Update University Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }


    public function destroy($full_name,$id){
        try { 
            $this->universityService->destroy($id);
            return redirect()->back()
                   ->with('success','Success Delete University Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

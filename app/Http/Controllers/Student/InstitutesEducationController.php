<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Education\InstituteInterface;

class InstitutesEducationController extends Controller{
    protected $instituteService ;
    public function __construct(InstituteInterface $instituteService){
        $this->instituteService = $instituteService;
    }
    
    public function store(Request $request){
        try { 
            $this->instituteService->store($request);
            return redirect()->back()
                   ->with('success','Success Create Institute Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function update(Request $request, $full_name,$id){
        try { 
            $this->instituteService->update($request , $id);
            return redirect()->back()
                   ->with('success','Success Update Institute Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }


    public function destroy($full_name,$id){
        try { 
            $this->instituteService->destroy($id);
            return redirect()->back()
                   ->with('success','Success Delete Institute Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

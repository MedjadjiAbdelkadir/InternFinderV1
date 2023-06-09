<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Education\SchoolInterface;

class SchoolsEducationController extends Controller{
    protected $schoolService ;
    public function __construct(SchoolInterface $schoolService){
        $this->schoolService = $schoolService;
    }
    
    public function store(Request $request){
        try { 
            $this->schoolService->store($request);
            return redirect()->back()
                   ->with('success','Success Create School Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function update(Request $request, $full_name, $id){
        try { 
            $this->schoolService->update($request , $id);
            return redirect()->back()
                   ->with('success','Success Update School Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }


    public function destroy( $full_name,$id){
        try { 
            $this->schoolService->destroy($id);
            return redirect()->back()
                   ->with('success','Success Delete School Education'); 
            
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}
 

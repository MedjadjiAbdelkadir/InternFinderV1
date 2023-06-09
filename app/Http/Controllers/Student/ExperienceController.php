<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\Controller;
use App\Interfaces\ExperienceInterface;

class ExperienceController extends Controller{

    protected $experienceService ;

    public function __construct(ExperienceInterface $experienceService){
        $this->experienceService = $experienceService;
    }

    public function store(Request $request ,$full_name){
        try {
            
            $this->experienceService->store($request);
            return redirect()->back()
                   ->with('success','Success Created Experience'); 
            
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function update(Request $request ,$full_name, $id){
        try {
            $this->experienceService->update($request , $id);
            return redirect()->back()->with('success','Success Update Experience');
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($full_name, $id){
        try {
            $this->experienceService->destroy($id);
            return redirect()->back()->with('success','Success Update Experience');
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

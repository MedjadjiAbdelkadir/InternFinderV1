<?php

namespace App\Http\Controllers\Student;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\AccountStudentInterface;

class AccountController extends Controller{
    protected $accountService ;

    public function __construct(AccountStudentInterface $accountService){
        $this->accountService = $accountService;
        // $this->middleware('auth:student');
    }
    public function show($name){
        try {
            $data = $this->accountService->show($name);
            if($data){

                $municipals = $data['municipals'];
                $states     = $data['states'];
                $level_languages = $data['level_languages'];
                $list_languages  = $data['list_languages'];

                $degree_universities   = $data['degree_universities'] ;
                $universities          = $data['universities'] ;
                $specialty_universities= $data['specialty_universities'] ;
                $degree_institutes     = $data['degree_institutes'] ;
                $durationExperiences   = $data['durationExperiences'] ;
                $jobs                  = $data['jobs'] ;


                
                return view('pages.student.profile.index', compact('states','municipals',
                'list_languages','level_languages',
                'universities','specialty_universities','degree_universities','degree_institutes','jobs','durationExperiences'
                ));
            }
            abort(404);
            // Code 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function dashboard($name){
        try {
            return view('pages.student.profile.dashboard');
            // Code 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function update(Request $request, $full_name){
        try {
            
            $name = $this->accountService->update($request,$full_name);

            return redirect()->route('student.index',$full_name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function settings(){
        try {
            return view('pages.student.profile.settings');
            // Code 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function updatePassword(Request $request , $name){
        try {
            $name = $this->accountService->updatePassword($request);
            return redirect()->route('student.changePassword',$name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($name){
        try {
            $this->accountService->destroy($name);
            return redirect()->route('loginForm');
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

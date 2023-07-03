<?php

namespace App\Http\Controllers\Auth;
use App\Models\State;

// use App\Http\Traits\AuthTrait;
use App\Interfaces\AuthInterface;

use App\Http\Requests\AuthRequest;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\RegisterCompanyRequest;
use App\Http\Requests\RegisterStudentRequest;


class AuthController extends Controller{
    // use AuthTrait;
    protected $authService ;


    public function __construct(AuthInterface $authService){
        $this->authService = $authService;
        $this->middleware('guest')->only('loginForm');
    }



    public function selectForm(){
        return view('pages.auth.selectForm');
    }
    public function registerFormCompany(){
        $states = State::get();
        return view('pages.auth.register_company',compact('states'));
    }
    public function registerFormStudent(){

        $states = State::get();
        return view('pages.auth.register_student',compact('states'));
    }

    public function registerCompany(RegisterCompanyRequest $request){
        
        // return $request;
        try {
            $data = $this->authService->registerCompany($request) ;
            
            if(!$data){
                return redirect()->back()
                ->with(['error'=>'Sorry, Fail Registration'])
                -> withInput($request->all());
            }
            return redirect()->route('company.dashboard.index', auth('company')->user()->name)
                             ->with(['success'=>'Welcome To Your New Account']);

        } catch (Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        } 
        
    } // end function Register Company

    public function registerStudent(RegisterStudentRequest $request){
        
        
        try {
            $data = $this->authService->registerStudent($request) ;
            
            if(!$data){
                return redirect()->back()
                ->with(['error'=>'Sorry, Fail Registration'])
                -> withInput($request->all());
            }
            // return redirect()->intended(RouteServiceProvider::STUDENT)
            return redirect()->route('student.dashboard.index', auth('student')->user()->full_name)
                             ->with(['success'=>'Welcome To Your New Account']);

        } catch (Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        } 
        
    } // End function Register Student

    public function loginForm(){
        return view('pages.auth.loginForm');

    }

    public function login(AuthRequest $request){
        try {
            $data = $this->authService->login($request) ;
            
            if(!$data){
                return redirect()->back()
                ->with(['error'=>'Incorrect email or password'])
                -> withInput($request->only('email'));
            }

            if(Auth('student')->check()){

                return redirect()->route('student.dashboard.index', auth('student')->user()->full_name);

            }else if(Auth('company')->check()){
                // route('company.dashboard.index',auth('company')->user()->name)
                return redirect()->route('company.dashboard.index', auth('company')->user()->name);
            }

        } catch (Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }   
    } // End Login

    public function logout() {
        try {
            
            $data = $this->authService->logout() ;

            if(!$data){
                return redirect()->back();
            }
            return redirect()->intended(RouteServiceProvider::LOGIN);

        } catch (Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
   
        } 
    }
}

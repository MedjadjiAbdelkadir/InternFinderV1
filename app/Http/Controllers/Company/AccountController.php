<?php

namespace App\Http\Controllers\Company;

use App\Models\State;
use App\Models\Municipal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\AccountCompanyInterface;


class AccountController extends Controller{

    protected $accountService ;

    public function __construct(AccountCompanyInterface $accountService){
        $this->accountService = $accountService;
        // $this->middleware('auth:student');
    }
    
    public function show($name){
        
        try {
            $data = $this->accountService->show($name);
            if($data){

                $municipals = $data['municipals'];
                $states     = $data['states'];
                return view('pages.company.profile.index', compact('states','municipals'));

            }
            abort(404);
            // Code 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function settings(){
        try {
            return view('pages.company.profile.settings');
            // Code 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function updatePassword(Request $request , $name){
        try {
            $name = $this->accountService->updatePassword($request);
            return redirect()->route('company.changePassword',$name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function update(Request $request , $name){
        try {
            
            $name = $this->accountService->update($request);

            return redirect()->route('company.index',$name);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($name){
        try {
     
            $name = $this->accountService->destroy($name);
            return redirect()->route('loginForm'); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

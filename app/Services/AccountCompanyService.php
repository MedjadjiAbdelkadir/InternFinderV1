<?php

namespace App\Services;

use Exception;
use App\Models\State;

use App\Models\Municipal;

use App\Interfaces\AccountCompanyInterface;
use App\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AccountCompanyService implements AccountCompanyInterface{

    public function show($name){
        try {
            if(auth('company')->user()->name == $name){
                $municipals = Municipal::where('state_id', auth('company')->user()->municipals->state_id)->get();
                $states = State::get();
                
                return [
                    'municipals' => $municipals,
                    'states' => $states,
                ];
            }
            
            
        }catch (ModelNotFoundException $e) {
            throw new Exception('Company not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function update($request){
        try {
            $company = Company::findOrFail(auth('company')->id());
            $company->update([
                'name'         => $request->name ,
                'email'        => $request->email ,
                'phone'        => $request->phone ,
                'municipal_id' => $request->municipal,
                'company_type' => $request->company_type, 

                'description'  => $request->description,
            ]);
            return $company->name ;
            
        }catch (ModelNotFoundException $e) {
            throw new Exception('Company not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function updatePassword($request){
        try {
            $company = Company::findOrFail(auth('company')->id());
            $company->update([
                'password'         => Hash::make($request->new_assword) ,
            ]);
            return $company->name ;

        }catch (ModelNotFoundException $e) {
            throw new Exception('Company not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function destroy($name){
        try {
            $company = Company::findOrFail(auth('company')->id());
            $company->delete() ;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Company not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

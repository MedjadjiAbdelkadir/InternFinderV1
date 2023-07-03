<?php
namespace App\Services;
// App\Services\AuthService 

// use App\Http\Traits\AuthTrait;
use App\Models\Company;
use App\Models\Student;
use App\Interfaces\AuthInterface;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthService implements AuthInterface{

    // use AuthTrait;

    // private $company;
    // private $student;
    
    // public function __construct(Company $company, Student $student){
    //     $this->company = $company;
    //     $this->student = $student;
    // }

    public function login($request){

        try {
            
            $credentials = $request->only('email', 'password');

            if(Auth::guard('company')->attempt($credentials)){
                return auth('company')->user();
            }else if(Auth::guard('student')->attempt($credentials)){
                return auth('student')->user();
            }else{
                return null;
            }
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    } // End function Login

    public function logout(){
        try {
            
            //Auth('student')->check()
            
            if(Auth('company')->check()){
                return auth('company')->logout();
            }else if(Auth('student')->check()){
                return auth('student')->logout();
            }else{
                return null;
            }
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    } // End function Logout


    public function registerCompany($request) {
        // try {
        //     Company::create([
        //         'name'         => $request->name ,
        //         'email'        => $request->email ,
        //         'password'     => Hash::make('12345678') ,
        //         'phone'        => $request->phone ,
        //         'municipal_id' => $request->municipal,
        //         'company_type' => $request->company_type, 
        //         'sector'       => $request->sector,
        //     ]);
            
        //     $credentials = $request->only('email', 'password');

        //     if(Auth::guard('company')->attempt($credentials)){
        //         return auth('company')->user();
        //     }else{
        //         return null;
        //     }
        // }catch (Exception $e) {

        //     throw new Exception('Internal Server Error');

        // }
        Company::create([
            'name'         => $request->name ,
            'email'        => $request->email ,
            'password'     => Hash::make('12345678') ,
            'phone'        => $request->phone ,
            'municipal_id' => $request->municipal,
            'company_type' => $request->company_type, 
            'address'      => '',
            'avatar'       => 'https://cdn4.iconfinder.com/data/icons/election-voting/512/as_1369-512.png',

            'category'        => $request->category,
            'description'     => '',
        ]);
        
        $credentials = $request->only('email', 'password');

        if(Auth::guard('company')->attempt($credentials)){
            return auth('company')->user();
        }else{
            return null;
        }
    } // End function RegisterCompany

    public function registerStudent($request) {
        try {
            $student = Student::create([
                'first_name' => $request->first_name ,
                'last_name'  => $request->last_name ,
                'email'=> $request->email ,
                'password'=> Hash::make($request->password) ,
                'phone'        => $request->phone ,
                'municipal_id' => $request->municipal,
                'dateBirth' => $request->dateBirth,
                'gender'     => $request->gender, 
            ]);
    
            
            $credentials = $request->only('email', 'password');
    
            if(Auth::guard('student')->attempt($credentials)){
                return auth('student')->user();
            }else{
                return null;
            }

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    } // End function RegisterCompany
    

} // End of class AuthService
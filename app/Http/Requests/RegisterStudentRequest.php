<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest{

    /*
      This Class AuthRequest About Requests Auth
      - rules() & messages() & attributes() & failedValidation()
      - Created by Medjadji Abdelkadir 
      - medjadjiabdelkadir22@gmail.com
      - 01:05 19/04/2023  
    */
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'first_name'         => 'required|string|min:6|max:255',
            'last_name'         => 'required|string|min:6|max:255',
            'email'        => 'required|email|unique:students,email|max:255',
            'phone'        => 'required|numeric|min:10',
            // 'phone'        => 'required|string|min:6|max:20|unique:students,phone',
            'password'     => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                // 'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'password_confirmation' => 'required_with:password|same:password|min:8', 

            'gender'  => 'required|in:Male,Female',
            'dateBirth' => 'required|date',
            
            'state'      =>'required|string',
            'municipal'  =>'required|string',
        ];
    }

    public function messages() {
        return [
            'required' => 'The :attribute field is required',
            'unique' => 'This :attribute has already exists',
            'regex'  => 'The :attribute field contains characters and numbers and special character'
        ];
    }

    public function attributes() {
        return [ 
            'first_name'         => 'First Name',
            'last_name'         => 'Last Name',
            'company_type' => 'Company Type',
            'email'        => 'Email Address',
            'phone'        => 'Phone Number',
            'password'     => 'Password',

            'state'=> 'State',
            'city' => 'City',
        ];
    }

    public function filters(){
        return [
            'email' => 'trim|lowercase',
            'first_name' => 'trim|capitalize|escape',
            'last_name' => 'trim|capitalize|escape'
        ];
    }
}

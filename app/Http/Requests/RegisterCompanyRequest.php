<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class RegisterCompanyRequest extends FormRequest{

    /*
      This Class AuthRequest About Requests Auth
      - rules() & messages() & attributes() & failedValidation()
      - Created by Medjadji Abdelkadir 
      - medjadjiabdelkadir22@gmail.com
      - 16:30 18/04/2023  
    */
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'name'         => 'required|string|min:6|max:255|unique:companies,name',
            'company_type'  => 'required|in:Public,Private',
            'category'      => 'required|string',
            'email'        => 'required|email|unique:companies,email|max:255',
            'phone'        => 'required|numeric|min:10|max:50|unique:companies,phone',
            'password'     => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            // 'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required_with:password|same:password|min:8', 
            'state'      =>'required',
            'municipal'       =>'required',
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
            'name'         => 'Company Name',
            'company_type' => 'Company Type',
            'category'     => 'Company Category',
            'email'        => 'Email Address',
            'phone'        => 'Phone Number',
            'password'     => 'Password',

            'state'=> 'State',
            'city' => 'City',
        ];
    }

    public function filters(){
        return [
            'email'    => 'trim|lowercase',
            'name'     => 'trim|capitalize|escape',
            'category' => 'trim|capitalize',
        ];
    }
    // public function failedValidation(Validator $validator){

    //     throw new HttpResponseException(
    //         /*
    //         response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'data'      => $validator->errors()
    //         ],400);
            
    //         response()->json([
    //             // 'error'=>$validator->errors()->toArray(),
    //             'message'   => 'Validation errors',
    //             'error'=> $validator->errors()->toArray()
    //         ],400)
    //  */
    //     );
    // }
}

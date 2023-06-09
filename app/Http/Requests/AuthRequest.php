<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AuthRequest extends FormRequest{

    /*
      This Class AuthRequest About Requests Auth
      - rules() & messages() & attributes() & failedValidation()
      - Created by Medjadji Abdelkadir 
      - medjadjiabdelkadir22@gmail.com
      - 23:30 17/03/2023  
    */
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'email'    => 'required|string|email' , 
            'password' => 'required' 
        ];
    }

    public function messages() {
        return [
            'email.required'     => 'Email Address field is Required',
            'password.required'  => 'Password field is Required',
        ];
    }

    public function attributes() {
        return [
            'email'    => 'Email Address',
            'password' => 'Password',
        ];
    }

    public function filters(){
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
    // public function failedValidation(Validator $validator){

    //     throw new HttpResponseException(
    //         response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'data'      => $validator->errors()
    //         ],400)
    //     );
    // }
}

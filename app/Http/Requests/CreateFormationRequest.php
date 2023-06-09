<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormationRequest extends FormRequest
{
    /*
      This Class AuthRequest About Requests Auth
      - rules() & messages() & attributes()
      - Created by Medjadji Abdelkadir 
      - medjadjiabdelkadir22@gmail.com
      - 13:30 15/05/2023  
    */
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'title'        => 'required|string|min:6|max:255|',
            'nbr_place'    => 'required|min:1|max:30',
            'permanence'   => 'required|in:1,2',
            'start'        => 'required|date',
            'end'          => 'required|date',
            'description'  => 'required|min:10|max:50',
            'municipal'    =>'required',
            'state'        =>'required',
            
            // 'language_name'  => 'required|array|min:1',
            // 'language_level'     => 'required|array|min:1',
            // 'specialty_school' => 'required|',
            // 'degree_school'    => 'required',
            // "specialty_experience" => 'required|',
            // "duration_experience" => 'required',
            // "language_name"    => "required",
            // "language_level"   => "required",

        ];
    }
    
    public function messages() {
        return [
            'required' => 'The :attribute field is required',
            'date' => 'This :attribute field is date',
        ];
    }

    public function attributes() {
        return [ 
            'title'        => 'Title Of Formation',
            'nbr_place'    => 'The number of positions available',
            'start'        => 'Start Date Of Formation',
            'end'          => 'End Date Of Formation',
            'description'  => 'description Of Formation',
            'municipal'    => 'municipal Of Formation',
            'state'        => 'state Of Formation',
        ];
    }

    public function filters(){
        return [

            'description' => 'trim|lowercase',
            'title' => 'trim|capitalize|escape'
        ];
    }
}

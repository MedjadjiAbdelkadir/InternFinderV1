<?php

namespace App\Services;

use App\Interfaces\LanguageInterface;
use Exception;
use App\Models\Language;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LanguageService implements LanguageInterface{
    public function store($request){
        try {
            $id = auth('student')->id();
            Language::create([
                'language_id'   => $request->lang_name,
                'level_id'      => $request->lang_level,
                'student_id'    => $id,
            ]); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($id){
        try {
            $language = Language::findOrFail($id);
            $language->delete() ;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Language not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

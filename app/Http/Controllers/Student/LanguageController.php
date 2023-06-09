<?php

namespace App\Http\Controllers\Student;

use Exception;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\LanguageInterface;

class LanguageController extends Controller{

    protected $languageService ;
    public function __construct(LanguageInterface $languageService){
        $this->languageService = $languageService;
    }


    public function store(Request $request ,$full_name){
        try {

            $this->languageService->store($request,);
            return redirect()->back()->with('success','Success Create Language'); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function destroy($full_name, $id){
        try {
            $this->languageService->destroy($id);
            return redirect()->back()
            ->with('success','Success Delete Language'); 
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

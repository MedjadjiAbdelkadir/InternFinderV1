<?php

namespace App\Interfaces;

interface LanguageInterface{

    // Create Language
    public function store($request);
    
    //  Delete Language
    public function destroy($id) ;
}

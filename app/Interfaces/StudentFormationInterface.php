<?php

namespace App\Interfaces;

interface StudentFormationInterface{
    //  Get All Formation
    public function allFormation($name ,$status) ;

    // Show Formation
    public function show($name, $formation);

    //  Create Formation
    public function store($request ,$name) ;
    
    //  Delete Formation
    public function destroy($name, $formation) ;
}

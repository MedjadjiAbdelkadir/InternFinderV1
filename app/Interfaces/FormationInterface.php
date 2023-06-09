<?php

namespace App\Interfaces;

interface FormationInterface{
    
    //  Get All Formation
    public function allFormation() ;
    
    //  Get Formation By Id
    public function getFormationById($id) ;

    // Show Formation
    public function show($id);

    // Edit Formation
    public function edit($id);
    //  Create Formation
    public function store($request) ;
    
    //  Update Formation
    public function update($request ,$id) ;
 
    //  Delete Formation
    public function destroy($id) ;
}

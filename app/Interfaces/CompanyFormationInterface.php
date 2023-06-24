<?php

namespace App\Interfaces;

interface CompanyFormationInterface{
    
    //  Get All Formation
    public function allFormation() ;

    public function allWithStatusFormation($name , $status);
    
    //  Get All Formation With Status
    public function allFormationWithStatus($name , $status);
    
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

    //  Update Status Formation
    public function updateStatus($request,$name, $id);
 
    //  Delete Formation
    public function destroy($id) ;
}

<?php

namespace App\Interfaces;

interface CompanyApplyInterface{
    //  Get All Apply
    public function allApply($formation) ;
    
    //  Get Apply By Id
    public function getApplyById($formation,$apply) ;

    // Edit Apply
    public function edit($id);
    //  Create Apply
    public function store($request) ;
    
    //  Update Apply
    public function update($request, $name , $formation_id , $id) ;
 
    //  Delete Apply
    public function destroy($id) ;
}

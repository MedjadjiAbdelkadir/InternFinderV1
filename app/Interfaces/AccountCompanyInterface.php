<?php

namespace App\Interfaces;

interface AccountCompanyInterface{
    
    //  Update AccountCompany
    public function show($name) ;
    //  Update AccountCompany
    public function update($request) ;
    // Update Password 
    public function updatePassword($request);
    //  Delete AccountCompany
    public function destroy($name) ;
}

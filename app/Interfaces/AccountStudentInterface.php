<?php

namespace App\Interfaces;

interface AccountStudentInterface{

    //  Update AccountStudent
    public function show($name) ;
    //  Update AccountStudent
    public function update($request,$full_name) ;
    // Update Password 
    public function updatePassword($request);
    //  Delete AccountStudent
    public function destroy($name) ;
}

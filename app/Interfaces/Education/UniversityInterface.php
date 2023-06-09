<?php

namespace App\Interfaces\Education;

interface UniversityInterface{
    //  Create Education University
    public function store($request) ;
    //  Update Education University
    public function update($request ,$id) ;
 
    //  Delete Education University
    public function destroy( $id) ;
}

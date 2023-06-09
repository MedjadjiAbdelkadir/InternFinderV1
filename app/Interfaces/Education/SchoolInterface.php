<?php

namespace App\Interfaces\Education;

interface SchoolInterface{
    //  Create Education School
    public function store($request) ;
    //  Update Education School
    public function update($request ,$id) ;
 
    //  Delete Education School
    public function destroy($id) ;
}

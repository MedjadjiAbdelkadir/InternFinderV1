<?php

namespace App\Interfaces\Education;

interface InstituteInterface{
    //  Create Education Institute
    public function store($request) ;
    //  Update Education Institute
    public function update($request ,$id) ;
    //  Delete Education Institute
    public function destroy($id) ;
}

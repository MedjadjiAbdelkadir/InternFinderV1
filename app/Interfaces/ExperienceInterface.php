<?php

namespace App\Interfaces;

interface ExperienceInterface{
    // Create Experience
    public function store($request);
    
    //  Update Experience
    public function update($request, $id) ;
 
    //  Delete Experience
    public function destroy($id) ;
}

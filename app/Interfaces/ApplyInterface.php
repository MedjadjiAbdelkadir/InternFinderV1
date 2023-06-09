<?php

namespace App\Interfaces;

interface ApplyInterface{
    //  Get All Apply
    public function allApply() ;
    
    // Show Apply
    public function show($id);

    // Edit Apply
    public function edit($id);
    //  Create Apply
    public function store($request) ;
    
    //  Delete Apply
    public function destroy($id) ;
}

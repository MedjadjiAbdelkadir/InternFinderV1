<?php

namespace App\Interfaces;

interface StudentEvaluationInterface{

    //  Get All Evaluation
    public function allEvaluation();


    public function create();
    // Show Evaluation
    public function show($id);

    // Edit Evaluation
    public function edit($id);

    //  Store Evaluation
    public function store($request) ;
    
    //  Update Evaluation
    public function update($request ,$id) ;

    //  Delete Evaluation
    public function destroy($id) ;
}

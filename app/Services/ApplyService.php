<?php

namespace App\Services;

use Exception;
use App\Models\Apply;
use App\Interfaces\ApplyInterface;
use App\Models\Formation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApplyService implements ApplyInterface{

    //  Get All Apply
    public function allApply(){
        try {
            $apply = Apply::with([
                'formations.company'
                // 'formations.formationUniversityEducations'
                ])->get();
            return $apply;
        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    
    // Show Apply
    public function show($id){
        try {
            // Code 
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    // Edit Apply
    public function edit($id){
        try {
            // Code 
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    //  Create Apply
    public function store($request){
        
        try {

            $formation = Formation::findOrFail($request->formation_id);
            Apply::create([
                'formation_id' => $formation ->id,
                'student_id'   => auth('student')->id() ,

            ]);
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    


    //  Delete Apply
    public function destroy($id){
        try {
            // Code 
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
}

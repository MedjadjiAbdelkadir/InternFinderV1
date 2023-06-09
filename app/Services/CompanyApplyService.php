<?php

namespace App\Services;

use Exception;
use App\Models\Apply;
use App\Interfaces\CompanyApplyInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyApplyService implements CompanyApplyInterface{
    //  Get All Apply
    public function allApply($formation) {
        try {
            $applicants =Apply::where('formation_id',$formation)->with([
                'formations',
                'students.universityEducations.specialty',
                'students.universityEducations.degreeUniversities',
            ])->orderBy('updated_at')->paginate(PAGINATE_COUNT);

            return $applicants;
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    //  Get Apply By Id
    public function getApplyById($formation,$apply) {
        try {
            $applicant =Apply::where('formation_id',$formation)->with([
                // 'formations',
                // 'students.universityEducations.specialty',
                // 'students.universityEducations.degreeUniversities',
                // 'students.universityEducations.university',
                // 'students.instituteEducations.degreeInstitutes',
                // 'students.instituteEducations.degreeInstitutes',
                // 'students.municipals.states',

                // 'students.experiences',
                // 'students.experiences.jobs',
                // 'students.experiences.durations',
                'students.languages.languages',
                'students.languages.levels'
            ])->findOrFail($apply);

            
            return $applicant;
        }catch (ModelNotFoundException $e) {
            throw new Exception('Apply Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    // Edit Apply
    public function edit($id){
        try {
            # Code 
        }catch (ModelNotFoundException $e) {
            throw new Exception('Apply Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    //  Create Apply
    public function store($request) {
        try {
            # Code 
        }catch (ModelNotFoundException $e) {
            throw new Exception('Apply Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    
    //  Update Apply
    public function update($request, $name , $formation_id , $id){
        try {
          
            // $formation = Formation::findOrFail($formation_id);
            $apply = Apply::findOrFail($id);
            $apply->update([
                'status' => $request->status,
            ]);

            // Send Email Notification To Student 
            
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply Not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }
    //  Delete Apply
    public function destroy($id){
        try {
            # Code 
        }catch (ModelNotFoundException $e) {
            throw new Exception('Apply Not found', 404);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

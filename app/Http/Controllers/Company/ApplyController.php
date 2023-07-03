<?php

namespace App\Http\Controllers\Company;

use App\Models\Apply;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CompanyApplyInterface;

class ApplyController extends Controller{
    protected $applyService ;
    public function __construct(CompanyApplyInterface $applyService){
        $this->applyService = $applyService;
    }

    public function index($name,$formation){
        $applicants = $this->applyService->allApply($formation);
        return view('pages.company.apply.index' ,compact('applicants'));   
    }

    public function create(){
        //
    }

    public function store(Request $request ){
        // return $request->formation_id;

        // dashboard.apply
        try{
            $formation = Formation::findOrFail($request->formation_id);
            Apply::create([
                'formation_id' => $formation ->id,
                'student_id'   => auth('student')->id() ,
            ]);
            $name = auth('student')->user()->full_name;
            return redirect()->route('student.dashboard.apply',$name );
        }catch (ModelNotFoundException $e) {

            throw new Exception('Apply not found', 404);

        }catch (Exception $e) {

            throw new Exception('Internal Server Error');

        }
    }

    public function show($name,$formation,$apply){
        // return 'name:' . $name.' formation:'.$formation.' apply:'.$apply;
        $applicant = $this->applyService->getApplyById($formation,$apply);

        // return response($applicant);
        return view('pages.company.apply.single' ,compact('applicant'));  
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $name , $formation_id , $id){
        $this->applyService->update($request, $name , $formation_id , $id);
        return redirect()->back()->with(['success' => 'Update Status Successfully']); 
    }

    public function destroy($id){
        //
    }
}

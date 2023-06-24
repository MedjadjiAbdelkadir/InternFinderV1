<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\StudentFormationInterface;

class FormationController extends Controller{

    protected $formationService ;
    public function __construct(StudentFormationInterface $formationService){
        $this->formationService = $formationService;
    }
    public function index($name){
        $applies = $this->formationService->allFormation($name , '');
        // foreach($applies as $apply){
        //     echo $apply->formations.'<br>';
        // }
        // return response($applies);

        return view('pages.student.formation.index', compact('applies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($name, $formation){

        $formation = $this->formationService->show($name, $formation);
        return view('pages.student.formation.single', compact('formation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($name, $formation){
        $name = $this->formationService->destroy($name, $formation);
    
        return redirect()->route('student.formations.index',$name);
    }
}

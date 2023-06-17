<?php

namespace App\Http\Controllers\Company;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apply;

class GetStudents extends Controller
{

    public function __invoke(Request $request)
    {
        $formation = $request->input('formation');
        $applys = Apply::with(['students'])
                        ->where('formation_id', $formation)
                        ->where('status', 4)
                        ->get();
        return response()->json($applys);
        // foreach($applys as $student) {
        //     $students[] = $student->students;
        // }
        // return response()->json($students);

    }
}

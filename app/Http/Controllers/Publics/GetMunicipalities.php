<?php

namespace App\Http\Controllers\Publics;

use App\Models\Municipal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetMunicipalities extends Controller
{

    public function __invoke(Request $request)
    {
        $state = $request->input('state');
        $municipalities = Municipal::where('state_id', $state)->get();

        
        return response()->json($municipalities);
    }
}

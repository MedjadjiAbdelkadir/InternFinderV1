<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusFormation extends Controller
{
    public function index($name ,$status){
        return 'Formation : '.$status  ;
    }
}

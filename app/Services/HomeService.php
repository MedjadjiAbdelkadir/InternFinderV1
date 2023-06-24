<?php

namespace App\Services;

use Exception;
use App\Models\Company;
use App\Models\Formation;
use App\Models\Municipal;
use App\Interfaces\HomeInterface;

class HomeService implements HomeInterface{
    public function index(){
        try {
            $companies = Company::all()->take(16);
            $formations = Formation::all()->take(9);
            return[

               'companies' => $companies,
               'formations' => $formations
            ];
            // Code
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllFormations(){
        try {
            return Formation::paginate(14);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
    public function getAllCompanies(){
        try {
            return Company::paginate(14);
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }

    public function searchFormations($request){
        try {
            // return $request->title;

            $place     = $request->place;
            $municipal = Municipal::where('name', 'like', '%' . $place . '%')->first();
            $title     =$request->title;

            return Formation::with('company')->whereHas('company', function ($q) use ($title) {
                $q->where('name', '=', $title);
            })->orWhere('title', 'LIKE', '%'.$title.'%')
              ->orWhere('municipal_id', 'LIKE', '%'.$municipal->id.'%')
              ->get();
            
            // ->where('title', 'LIKE', '%'.$title.'%')
              

            // return Formation::with('company')
            //       ->where('title', 'LIKE', '%'.$title.'%')
            //       ->get();

            // ->where('state_départ', 'LIKE', '%'.$state_départ.'%')
            // ->where('state_arrivé', 'LIKE', '%'.$state_arrivé.'%')

            // return Formation::with('company')->whereHas('company' ,function($query) use ($title){
            //     return $query->where('name',$title);

            // })->get();
            /*

->where('title', $request->title)
              ->where('municipal_id' ,$municipal->id )
            */
            // return $request;
            // $formations = Formation::where('name', 'like', '%' . request('search') . '%')
            //             ->where('name', 'like', '%' . request('search') . '%')
            //             ->get();

                        // if (request('search')) {
                        //     ＄users = User::where('name', 'like', '%' . request('search') . '%')->get();
                        // } else {
                        //     ＄users = User::all();
                        // }
        }catch (Exception $e) {
            throw new Exception('Internal Server Error');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Location;
use App\place;
use Illuminate\Http\Request;

class SearchLocationController extends Controller
{
    //

public function searchlocation(Request $request){

    $lat=$request->lat;
    $lng=$request->lng;

    $locations=Location::whereBetween('lat',[$lat-1.0,$lat+1.0])->whereBetween('lng',[$lng-1.0,$lng+1.0])->get();


    return $locations;

}



    public function searchcity(Request $request){


        $distval=$request->distval;
        $matchedCities=place::where('place',$distval)->pluck('type','type');
        return view('ajaxresult',compact('matchedCities'));
    }



}

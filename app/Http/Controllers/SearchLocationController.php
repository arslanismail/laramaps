<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class SearchLocationController extends Controller
{
    //

public function searchlocation(Request $request){

    $lat=$request->lat;
    $lng=$request->lng;

    $locations=Location::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();


    return $locations;

}


}

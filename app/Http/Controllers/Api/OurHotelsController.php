<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurHotelsController extends Controller
{
    
    //it is an aggregator method that aggregates both tophotel and besthotels
    public function searchAggregator(Request $request){
        foreach ($this->providers as $key => $provider){

             $prov = (new $provider())->search($request,$key);
             $response[] = $prov;  
        }
        return $response;

    }
}

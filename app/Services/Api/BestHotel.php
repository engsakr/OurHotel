<?php

namespace App\Services\Api;
use Illuminate\Http\Request;

class BestHotel
{

    
    public function search(Request $request,$key){
        $date_from   = $request->query('date_from');
        $date_to     = $request->query('date_to');
        $city        = $request->query('city');
        $adults      = $request->query('adults_number');
        $path = storage_path() . "/json/${key}.json";
        $json = json_decode(file_get_contents($path), true); 
        $result = array_filter($json, function ($var) use ($date_from,$city,$adults) {
            return ($var['date'] == $date_from && $var['city'] == $city && $var['numberOfAdults'] == $adults);
        });
        return $result;
        // print_r($result);
    }
}
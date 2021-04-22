<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleMapsController extends Controller
{
    //
    public function search(){
    	$query=request()->term;
    	
        if($query == ''){
            $query='Nairobi';
        }
    	$response = \GoogleMaps::load('placeautocomplete')
    			->setEndpoint('json')

                ->setParamByKey('components', 'country:ke')
                ->setParamByKey('input', $query)
                ->get();
        $locations = json_decode($response, true);
        
        $locationD=array();
		$i=0;
        foreach ($locations['predictions'] as $prediction) {
		$locationD[$i]=array(); 
		$locationD[$i]['id']=$prediction['place_id'];
		$locationD[$i]['text']=$prediction['description'];
		$i++;
		}
		return response ()->json ($locationD);
    }

    public function getCordinates($place_id){
    	$response = \GoogleMaps::load('geocoding')
		->setParam (['place_id' =>$place_id])
 		->get();
 		$latlong=json_decode($response, true)['results'][0]['geometry']['location'];
 		return $latlong;
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'user_id'=>$this->user_id, 
            'place_id'=>$this->place_id, 
            'latitude'=>$this->latitude, 
            'longitude'=>$this->longitude, 
            'location_description'=>$this->location_description
        ];
    }
}

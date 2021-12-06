<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
             'name'=>$this->name,
             'description'=>$this->description,
             'contact_person'=>$this->contact_person,
             'contact-person_phone'=>$this->contact,
             'contact_person_email'=>$this->contact_person_email,
             'place_id'=>$this->place_id,
             'longitude'=>$this->longitude,
             'latitude'=>$this->latitude
           ];
    }
}

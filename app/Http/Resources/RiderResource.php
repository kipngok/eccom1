<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RiderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
         'user_id'=>$this->user_id,
         'reg_no'=>$this->reg_no,
         'type'=>$this->type,
         'status'=>$this->status,
         'place_id'=>$this->place_id,
         'longitude'=>$this->longitude,
         'latitude'=>$this->latitude
      ];
    }
}

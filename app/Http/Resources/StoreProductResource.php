<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StoreResource;

class StoreProductResource extends JsonResource
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
         'store_id'=>$this->store_id,
         'store'=>new StoreResource($this->store),
         'product_id'=>$this->product_id,
         'quantity'=>$this->quantity
     ];

    }
}

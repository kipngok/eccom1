<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
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
             'subTotal'=>$this->subTotal,
             'items'=>$this->items,
             'total'=>$this->total,
             'discount'=>$this->discount,
             'tax'=>$this->tax,
         ];
    }
}


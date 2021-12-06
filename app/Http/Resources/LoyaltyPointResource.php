<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\OrderResource;

class LoyaltyPointResource extends JsonResource
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
            'id'=>$this->'id',
            'user_id'=>$this->user_id,
            'user'=>new UserResource($this->user),
            'points'=>$this->points, 
            'date'=>$this->date, 
            'order_id'=>$this->order_id, 
            'order'=>new OrderResource($this->order),
            'order_amount'=>$this->order_amount
        ];
    }
}

 
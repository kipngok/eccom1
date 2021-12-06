<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\RiderResource;


class DeliveryResource extends JsonResource
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
         'order_id'=>$this->order_id,
         'order'=>new OrderResource($this->order),
         'rider_id'=>$this->rider_id,
         'rider'=>new RiderResource($this->rider),
         'scheduled_date'=>$this->scheduled_date,
         'scheduled_time'=>$this->scheduled_time,
         'scheduled_by'=>$this->scheduled_by,
         'status'=>$this->status,
         'dispatched_by' =>$this->dispatched_by,
         'dispatched_at'=>$this->dispatched_at,
         'delivery_time'=>$this->delivery_time,
         'delivery_date'=>$this->delivery_date,
         'notes'=>$this->notes,
       ]; 
    }
}


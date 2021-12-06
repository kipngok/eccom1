<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderItemResource;
class OrderResource extends JsonResource
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
             'name'=>$this->name,
             'email'=>$this->email,
             'phone'=>$this->phone,
             'place_id'=>$this->place_id,
             'latitude'=>$this->latitude,
             'longitude'=>$this->longitude,
             'location_description'=>$this->location_description,
             'discount'=>$this->discount,
             'discount_code'=>$this->discount_code,
             'subtotal'=>$this->subtotal,
             'formated_subtotal'=>number_format($this->subtotal,2),
             'tax'=>$this->tax,
             'formated_tax'=>number_format($this->tax,2),
             'total'=>$this->total,
             'formated_total'=>number_format($this->total,2),
             'payment_gateway'=>$this->payment_gateway,
             'status'=>$this->status,
             'is_paid'=>$this->is_paid,
             'rider_id'=>$this->rider_id,
             'affiliate_code'=>$this->affiliate_code,
             'store_id'=>$this->store_id,
             'created_at' => $this->created_at->format('Y-F-j'),
             'orderItems'=>OrderItemResource::collection($this->orderItems),
     ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\ProductResource;

class ReveiwResource extends JsonResource
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
            'user'=> $this->user->name, 
            'product_id'=>$this->product_id,
            'rating'=>$this->rating, 
            'review'=>$this->review,
            'date'=>date_format(date_create($this->created_at),"M Y"),
        ];
    }
}


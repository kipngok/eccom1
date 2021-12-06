<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MakeResource;
use App\Http\Resources\VehicleModelResource;

class SpareRequestResource extends JsonResource
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
            'photo'=>$this->photo, 
            'email'=>$this->email, 
            'user_id'=>$this->user_id, 
            'user'=>$this->user->name ?? '',
            'phone'=>$this->phone, 
            'notes'=>$this->notes, 
            'make_id'=>$this->make_id,
            'make'=>$this->make->name??'', 
            'model_id'=>$this->model_id, 
            'model'=>$this->model->name??'',
            'status'=>$this->status, 
            'sub_category_id'=>$this->sub_category_id,
            'sub_category'=>$this->sub_category->name??'' ,
            'category_id'=>$this->category_id,
            'category'=>$this->category->name??'',
        ];

    }
}


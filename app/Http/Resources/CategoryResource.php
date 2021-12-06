<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\ProductResource;

class CategoryResource extends JsonResource
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
            'icon'=>url('/'). $this->icon ?? 'https://sukiapp.sukispares.com/uploads/icons/Ved1p5AoXRkoaGhXv37DLNfr0aAHxbGtQ3RKOvNa.png',
            'slug'=>$this->slug,
            'subCategories'=>SubCategoryResource::collection($this->subCategories),
            'order'=>$this->order,
       ];
    }
}

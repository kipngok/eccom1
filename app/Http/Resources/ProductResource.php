<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubCategory;
use App\Http\Resources\CategoryResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(isset($this->sale_price)){
        $percentage=number_format(($this->price/$this->sale_price??$this->price)*100,2);}
        else{
            $percentage=0; 
        }
        
        return [
        'id'=>$this->id,
        'name'=>$this->name,
        'first_image'=>url('/').$this->firstImage,
        'slug'=>$this->slug,
        'meta'=>$this->meta,
        'price'=>$this->price,
        'formated_price'=>number_format($this->price,2),
        'effective_price'=>$this->effectivePrice,
        'formated_effective_price'=>number_format($this->effectivePrice,2),
        'sale_price'=>$this->sale_price??'',
        'percentage'=>$percentage,
        'description'=>$this->description,
        'featured'=>$this->featured,
        'sub_category_id'=>$this->sub_category_id,
        'subCategory'=>$this->subCategory->name,
        'category'=>$this->category->name,
        'category_id'=>$this->category_id,
        'status'=>$this->status,
        'images'=>$this->images,
        'rating'=>$this->rating,
        ];
    }
}

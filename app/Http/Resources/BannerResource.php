<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'location' => $this->location,
            'status' => $this->status,
            'heading' => $this->heading,
            'subHeading' => $this->subHeading,
            'content' => $this->content,
            'img'=> url('/').$this->getMedia('banners')->first()->getUrl(),
            'category_id'=>$this->category_id,
            'sub_category_id'=>$this->sub_category_id,
        ];
    }
}

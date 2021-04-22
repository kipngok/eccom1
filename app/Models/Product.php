<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
  use HasMediaTrait;
  use HasFactory;

  protected $fillable = ['id', 'name', 'slug', 'meta', 'price', 'sale_price', 'description', 'featured', 'quantity', 'image1', 'image2', 'image3', 'image4', 'make_id', 'model_id', 'year', 'engine', 'fuel', 'sub_category_id', 'category_id', 'status','is_featured'];
  public function make(){
        return $this->hasOne('App\Models\Make', 'id', 'make_id')->withDefault(['name'=>'Deleted']);
  }
  public function model(){
        return $this->hasOne('App\Models\VehicleModel', 'id', 'model_id')->withDefault(['name'=>'Deleted']);
  }
  public function category(){
        return $this->hasOne('App\Models\Category', 'id', 'category_id')->withDefault(['name'=>'Deleted']);
       }
  public function subCategory(){
        return $this->hasOne('App\Models\SubCategory', 'id', 'sub_category_id')->withDefault(['name'=>'Deleted']);
       }
  public function reviews(){
        return $this->hasMany('App\Models\Review', 'product_id', 'id');
  }
  public function getFirstImageAttribute($value){
      if($this->getMedia('products')->first()){
        $url=$this->getMedia('products')->first()->getUrl();
      }
      else{
        $url='/img/not-found.png';
      }
      return $url;
    }
 public function getEffectivePriceAttribute($value){
  $effectivePrice=$this->price;
  if(isset($this->sale_price)){
    $effectivePrice=$this->sale_price;
  }
  return $effectivePrice;
 }

 public function getRatingAttribute($value){
  $count=1;
  $rating=1;
  foreach($this->reviews as $review){
    $rating+=$review->rating;
    $count++;
  }
  $ratingAverage= $count/$rating;
  return $ratingAverage;
 }
}

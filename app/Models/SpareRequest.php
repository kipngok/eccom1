<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class SpareRequest extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable = ['id', 'name', 'photo', 'email', 'user_id', 'phone', 'notes', 'make_id', 'model_id','chassis_number', 'status', 'sub_category_id', 'category_id'];

    public function make(){
    return $this->hasOne('App\Models\Make', 'id', 'make_id');
    }
    public function model(){
    return $this->hasOne('App\Models\VehicleModel', 'id', 'model_id');
    }
    public function subCategory(){
    return $this->hasOne('App\Models\SubCategory', 'id', 'sub_category_id');
    }
    public function category(){
    return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}

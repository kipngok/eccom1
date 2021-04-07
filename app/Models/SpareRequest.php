<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareRequest extends Model
{
    use HasFactory;
    protected $fillable = [
      	'id','photo','email','notes','make_id','model_id','status','subcategory_id','category_id'];

    public function make(){
    return $this->hasOne('App\Models\Make', 'id','make_id');
    }
    public function make(){
    return $this->hasOne('App\Models\Model', 'id','model_id');
    }
    public function subcategory(){
    return $this->hasOne('App\Models\Sub_category', 'id','subcategory_id');
    }
    public function category(){
    return $this->hasOne('App\Models\Category', 'id','category_id');
    }
}

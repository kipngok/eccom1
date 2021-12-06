<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'category_id','slug'];
    
  	public function category(){
   		return $this->hasOne('App\Models\Category', 'id', 'category_id')->withDefault(['name'=>'Deleted']);
 	}
 	 public function products(){
        return $this->hasMany('App\Models\Product', 'sub_category_id', 'id')->limit(4);
    }
}

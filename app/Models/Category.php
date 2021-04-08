<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','slug','order'];

    public function products(){
        return $this->hasMany('App\Modes\Product', 'category_id', 'id')->withDefault(['name'=>'Deleted']);
        }
    public function sub_category(){
        return $this->hasMany('App\Models\Product', 'category_id', 'id')->withDefault(['name'=>'Deleted']);
        }
}

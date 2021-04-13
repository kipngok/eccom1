<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','slug','order'];

    public function products(){
        return $this->hasMany('App\Modes\Product', 'category_id', 'id');
        }
    public function subCategories(){
        return $this->hasMany('App\Models\SubCategory', 'category_id', 'id');
        }
}

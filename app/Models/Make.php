<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','order','is_featured'];
    public function products(){
  	return $this->hasMany('App\Models\Product', 'make_id','id');
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $fillable = [
	'id','name','category_id'];
  	public function category(){
   	return $this->hasOne('App\Models\Category', 'id','category_id')->withDefault(['name'=>'Deleted']);
 	}
}

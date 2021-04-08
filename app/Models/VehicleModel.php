<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'make_id'];
    
  	public function models(){
   		return $this->hasOne('App\Models\Make', 'id', 'make_id')->withDefault(['name'=>'Deleted']);
  	}
}


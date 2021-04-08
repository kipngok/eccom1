<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Make;


class Mechanic extends Model
{
    use HasFactory;
    protected $fillable = ['id','location','latitude','longitude','make_ids','status','approved','user_id'];

  	
  	public function getMakesAttribute($value){
  		$make_ids=explode(',',$this->make_ids);
  		$makes=Make::whereIn('id',$make_ids)->get();
		return $makes;
	}

	public function user(){
		return $this->hasOne('App\Models\User', 'id','user_id');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mechanic extends Model
{
    use HasFactory;
    protected $fillable = [
    'id','location','latitude','longitude','make_id','status','approved','user_id'];
  	public function make(){
	return $this->hasMany('App\Models\Make', 'id','make_id');
	}
	public function user(){
	return $this->hasOne('App\Models\User', 'id','user_id');
	}
}

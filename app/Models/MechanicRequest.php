<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicRequest extends Model
{
    use HasFactory;
    protected $fillable = [
      'id','mechanic_id','user_id','notes','make_id','model_id','status','approved'];
    public function mechanic(){
  	return $this->hasOne('App\Model\Mechanic', 'id','mechanic_id' );
    }

  public function user(){
     return $this->hasOne('App\Models\User', 'id','user_id');
    }
  public function make(){
   return $this->hasOne('App\Models\Make', 'id','make_id');
  }
  public function model(){
   return $this->hasOne('App\Models\VehicleModel', 'id','model_id');
  }

}

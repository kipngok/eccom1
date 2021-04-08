<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  use HasFactory;
  protected $fillable = ['id','product_id','order_id','qty','price','amount'];

  public function product(){
  	return $this->hasOne('App\Models\Product', 'id','product_id');
  }
  public function order(){
  	return $this->hasOne('App\Models\Order', 'id','order_id');
  }
}

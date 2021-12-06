<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'name', 'email', 'phone', 'place_id', 'latitude', 'longitude', 'location_description', 'discount', 'discount_code', 'subtotal', 'tax', 'total', 'payment_gateway', 'paying_number', 'status', 'is_paid', 'rider_id','affiliate_code'];


    public function user(){
        return $this->hasOne('App\Models\User', 'id','user_id');
    }
    public function rider(){
        return $this->hasOne('App\Models\Rider', 'id','rider_id');
    }
    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem', 'order_id','id');
    }
}

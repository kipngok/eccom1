<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city','billing_postalcode', 'billing_phone', 'billing_discount', 'billing_discount_code','billing_subtotal','billing_tax', 'billing_total', 'shipping_city', 'shipping_location', 'shipping_latitude', 'shipping_longitude','payment_gateway', 'status', 'rider_id'];

    public function user(){
        return $this->hasMany('App\Models\User', 'id','user_id');
    }
    public function rider(){
        return $this->hasMany('App\Models\Rider', 'id','rider_id');
    }
}

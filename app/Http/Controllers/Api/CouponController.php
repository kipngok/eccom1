<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons = Coupon::all();
        return response(['coupons' => CategoryResource::collection($coupons)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function check(Request $request)
    {
        $input=$request->all();
        $coupon=Coupon::where('code','=',$input['code'])->first();
        if(isset($coupon) && $coupon->expiry_date >=date('Y-m-d')){
            session()->put('coupon', [
                'name' => $coupon->code,
                'discount' => $this->calculateDiscount($coupon,Cart::subtotal()),
            ]);
            return ['status'=>'valid','message'=>'<i class="fa fa-check"></i> Coupon code was applied succesfully'];
        }
        else{
            $request->session()->forget('coupon');
            return ['status'=>'invalid','message'=>'<i class="fa fa-times"></i> Coupon code is invalid'];
        }
    }

    public function calculateDiscount($coupon,$amount){
        if($coupon->type =='Percentage'){
            $discount=$amount*$coupon->value/100;
        }
        else{
            $discount=$coupon->value;
        }
         return response()->json($discount);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $input = $request->all(); 
        $validator = Validator::make($input, [
            'code'=>'required',
            'type'=>'required',
            'value'=>'required',
            'expiry_date'=>'required'
        ]);
    if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
         }
        $coupon=Coupon::create( $input);
         return response()->json($coupon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
          $coupon ->delete();
        return response(['message' => 'Deleted']);
    }
}

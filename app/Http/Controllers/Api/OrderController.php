<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
 // ->when(!isset(Auth::user()->is_admin), function ($query) {
 //                                                    return $query->where('user_id','=',Auth::user()->id);
 //                                                })
 
 
   public function allOrders()
    {   
        
        $orders = Order::where('user_id','=', Auth::user()->id)->paginate(20);
         return response(['orders' => OrderResource::collection($orders), 'message' => 'Retrieved successfully']);
        
    }
  
   public function pending()
    {   
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                        ->where('status','=','Pending')->paginate(20);
        return response(['orders' => OrderResource::collection($orders), 'message' => 'Retrieved successfully']);
        
    }

    public function complete()
    {   
      
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                        ->where('status','=','Completed')->paginate(20);
      return response(['orders' => OrderResource::collection($orders), 'message' => 'Retrieved successfully']);
        
    }
    public function delivery()
    {   
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                    return $query->where('user_id','=',Auth::user()->id);
                                })
                        ->where('status','=','Delivery in progress')->paginate(20);
        return response(['orders' => OrderResource::collection($orders), 'message' => 'Retrieved successfully']);
        
    }

    public function affiliate()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::where('affiliate_code','=', Auth::user()->affiliateCode)
                        ->whereNotNull('affiliate_code')
                        ->orderBy('created_at','desc')
                        ->paginate(20);
        return response(['orders' => OrderResource::collection($orders), 'message' => 'Retrieved successfully']);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
    

        $input = $request->all();
        $user=Auth::user();
        $input['user_id']=$user->id;
        $input['status']='Created';
        $input['name']=$user->name;
        $input['email']=$user->email;
        $input['phone']=$user->phone;
        $order=Order::create($input);
        $items=explode('||',$input['items']);
        foreach ( $items as $item){
        $itemD=explode(',',$item);
        if(count($itemD)>1){
        $orderItemD=['product_id'=>$itemD[0],'order_id'=>$order->id,'qty'=>$itemD[1],'price'=>$itemD[2],'amount'=>$itemD[3]];
        $orderItem=OrderItem::create($orderItemD);
        }
        }   
        return response()->json($order);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        
    }
    public function singleOrder($id){ 
     $order=Order::find($id);
    return new OrderResource($order);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


}

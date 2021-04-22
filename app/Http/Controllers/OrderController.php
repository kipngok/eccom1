<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Rider;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::orderBy('created_at','desc')->paginate(20);
        return view('order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }*/

    public function pending()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                        ->where('status','=','Pending')->paginate(20);
        return view('order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function complete()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                        ->where('status','=','Completed')->paginate(20);
        return view('order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function delivery()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::orderBy('created_at','desc')
                        ->when(!isset(Auth::user()->is_admin), function ($query) {
                                    return $query->where('user_id','=',Auth::user()->id);
                                })
                        ->where('status','=','Delivery in progress')->paginate(20);
        return view('order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function affiliate()
    {   
        $this->authorize('viewAny', Order::class);
        $orders = Order::where('affiliate_code','=', Auth::user()->affiliateCode)
                        ->whereNotNull('affiliate_code')
                        ->orderBy('created_at','desc')
                        ->paginate(20);
        return view('order.affiliate',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }


    public function landing(){
        return view('order.landing');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Order::class);
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'place_id'=>'required'
        ]);

        $input = $request->all();
        $user=User::where('email','=',$input['email'])->first();
        if(isset($user)){
        $input['user_id']=$user->id;}
        $input['discount']=session()->get('coupon')['discount'] ?? 0;
        $input['discount_code']=session()->get('coupon')['name'] ?? 0;
        $input['tax']=(float)implode('',explode(',',Cart::tax()));
        $input['subtotal']=(float)implode('',explode(',',Cart::subtotal()))-$input['tax'];
        $input['total']=(float)implode('',explode(',',Cart::subtotal())) - $input['discount'];
        $input['status']='Created';
        $order=Order::create($input);

        foreach (Cart::content() as $item){
        $orderItemD=['product_id'=>$item->model->id,'order_id'=>$order->id,'qty'=>$item->qty,'price'=>$item->model->effectivePrice,'amount'=>$item->subtotal];
        $orderItem=OrderItem::create($orderItemD);
        }

        Cart::instance('default')->destroy();
        session()->forget('coupon');
        
        return redirect('/payment/'.$order->id);
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
        $riders=Rider::all();
        $this->authorize('view', $order);
        return view('order.show', compact('order','riders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $this->authorize('update', $order);
        return view('order.edit', compact('order'));
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
        $this->authorize('update', $order);
        $input = $request->all();
        $order->update( $input);
        return redirect('/order/'.$order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order){
        //
        $this->authorize('delete', $order);
        $order->delete();
        return redirect('/order');
    }
}

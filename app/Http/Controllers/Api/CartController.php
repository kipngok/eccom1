<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items=Cart::content();
        $discount=session()->get('coupon')['discount'] ?? 0;
        /*dd(Cart::subtotal());*/
        $tax=(float)implode('',explode(',',Cart::tax()));
        $subTotal=(float)implode('',explode(',',Cart::subtotal()))-$tax;
        $total=(float)implode('',explode(',',Cart::total()));
        $total=(float)implode('',explode(',',Cart::subtotal())) - $discount;
        return response(['total' => $total,'subTotal' => $subTotal,'tax' => $tax,'items'=>$items, 'message' => 'Retrieved successfully']);


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeAjax(Request $request)
    {
        $input=$request->all();
        $product=Product::find($input['product_id']);
        $ids=$request->session()->get('ids');
        $ids[]=$input['product_id'];
        $request->session()->put('ids', $ids);
        Cart::add($product->id, $product->name, 1, $product->effectivePrice)
            ->associate('App\Models\Product');
        $items=Cart::content();
           return response()->json($ids);
    
    }

    public function removeAjax(Request $request)
    {
        $input=$request->all();
        Cart::remove($input['rowId']);
        $items=Cart::content();
        return response()->json($items);
      
    }



    public function removeAjaxPage(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::remove($input['rowId']);
        $items=Cart::content();
        return response()->json($items);
        
    }


     public function updateAjaxPage(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::update($input['rowId'], $input['qty']);
        $items=Cart::content();
        return response()->json($items);
       
    }

   

    public function  cartGet()
    {
        $items=Cart::content();
        return response()->json($items);
        
    }

    public function  cartGetPage()
    {
        $items=Cart::content();
       return response()->json($items);
    }

    public function  getTotals()
    {
        $discount=session()->get('coupon')['discount'] ?? 0;
        /*dd(Cart::subtotal());*/
        $tax=(float)implode('',explode(',',Cart::tax()));
        $subTotal=(float)implode('',explode(',',Cart::subtotal()))-$tax;
        $total=(float)implode('',explode(',',Cart::total()));
        $total=(float)implode('',explode(',',Cart::subtotal())) - $discount;
        return view('cart.totals', compact('subTotal','total','discount','tax'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

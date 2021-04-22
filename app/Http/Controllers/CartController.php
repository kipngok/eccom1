<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        return view('cart.index', compact('subTotal','items','total','discount','tax'));
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

    public function storeAjax(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::add($product->id, $product->name, $input['quantity'], $product->effectivePrice)
            ->associate('App\Models\Product');
        $items=Cart::content();
        /*dd(Cart::subtotal());*/
        return view('cart.get', compact('items'));
    }

    public function removeAjax(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::remove($input['rowId']);
        $items=Cart::content();
        /*dd(Cart::subtotal());*/
        return view('cart.get', compact('items'));
    }



    public function removeAjaxPage(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::remove($input['rowId']);
        $items=Cart::content();
        return view('cart.cart', compact('items'));
    }


     public function updateAjaxPage(Request $request, Product $product)
    {
        $input=$request->all();
        Cart::update($input['rowId'], $input['qty']);
        $items=Cart::content();
        return view('cart.cart', compact('items'));
    }

   

    public function  cartGet()
    {
        $items=Cart::content();
        return view('cart.get', compact('items'));
    }

    public function  cartGetPage()
    {
        $items=Cart::content();
        return view('cart.cart', compact('items'));
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

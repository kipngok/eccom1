@extends('layouts.frontend')
@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-sm-12">
        <h4 style="font-weight: 800; margin-top: 50px; margin-bottom: 20px;">{{ Cart::instance('default')->count() }} item(s) in Shopping Cart</h4>
        <div class="over-flow">
        <div id="cart">
		<table class="table table-bordered">
    		<thead>
        		<tr> 
                    <th>#</th>  
                    <th>Images</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th width="150px">Qty</th>
                    <th>Total</th>
                </tr>
        		</thead>
        		<tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                        <form action="" method=""> 
                            @csrf
                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                            <button class="btn btn-sm btn-light removeFromCartPage"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                        <td><a href="/sparepart/{{$item->model->slug}}" class="minicart-product-image"><img src="{{$item->model->firstImage}}" alt="cart products" width="50px"></a>
                        </td>
                        <td><a href="/sparepart/{{$item->model->slug}}/{{$item->model->id}}">{{ $item->model->name }}</a></td>
                        <td>{{'Kes.'.number_format($item->model->effectivePrice)}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                <input type="hidden" name="product_id" value="{{$item->model->id}}">
                                <div class="input-group">
                                <button class="btn btn-md btn-outline-dark minus"><i class="fa fa-minus"></i></button>
                                <input type="number" name="qty" value="{{ $item->qty }}" class="form-control qty" style="border-color: #000;">
                                <button class="btn btn-md btn-outline-dark plus"><i class="fa fa-plus"></i></button>
                                </div>
                            </form>
                        </td>
                        <td>{{ 'Kes. '.number_format($item->subtotal,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
		</table>
	</div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div id="couponMessage"></div>
        <form action="" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="code" class="form-control" placeholder="Enter Coupon Code">
                <button class="btn btn-md btn-warning coupon">Validate Code</button>
            </div>
        </form>
        <div id="total">
            <table class="table table-condensed table-bordered mt-2 mb-5">
                <tbody>
                    <tr>
                        <th>Subtotal</th><td>{{ 'Kes.'.$subTotal}}</td>
                    </tr>
                    <tr>
                        <th>Tax (V.A.T)</th><td>{{ 'Kes.'.$tax }}</td>
                    </tr>
                    <tr>
                        <th>Discount</th><td>Kes. {{number_format($discount)}}</td>
                    </tr>
                    <tr>
                        <th>Total</th><td>Kes. {{number_format($total)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
            <div class="total-btns">
            <a href="/shop"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
            <a href="/checkout">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
</div>
</div>

@endsection

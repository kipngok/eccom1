@extends('layouts.frontend')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12 mt-5">
			<h3 style="text-align: center; font-weight: 800; font-size: 24px;">Make payment for your order</h3>
			<h5 style="text-align: center; font-weight: 600;">Amount Due: Kes. {{number_format($order->total,2)}}</h4>
		</div>
	</div>
	<div class="row justify-content-center mt-2 mb-5 g-3">
		<div class="col-sm-5">
              <div class="card">
              <div class="card-body">
              <img src="/img/mpesa.png" width="200px" style="display: block; margin: auto;">
              <form action="" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">
                <div class="form-group" style="margin-bottom: 0px;">
                  <label style="text-align: center; display: block;">Confirm your phone number</label>
                  <input type="text" name="phone" class="form-control" value="{{$order->phone}}" id="phone" style="text-align: center;">
                </div>
                <button type="submit" class="btn btn-sm btn-info btn-block" id="mpesaButton"><i class="fa fa-plus"></i> Make payment</button>
              </form>
              <a href="/order/payment/confirmed/{{$order->id}}" class="btn btn-sm btn-success btn-block mt-2"><i class="fa fa-check"></i> Complete payment</a>
              
              <div class="alert alert-info mt-2" style="font-size: 12px;"><strong>Note!</strong> You shall receive a payment prompt on your phone to enter your MPESA PIN. Once you make your payment and receive confirmation from safaricom, click on the complete button to complete your transaction</div>
              
            </div>
          </div>


          <!-- Success Card -->
                   <div class="card success-card mt-2">
                       <div class="card-body">
                       	<h3 style="text-align: center; font-weight: 800; font-size: 20px;">Pay via card / Bank Transfer</h3>
                           <div class="success-cont">
                              <form method="post" action="https://payments.ipayafrica.com/v3/ke">
                                <input name="live" type="hidden" value="{{$fields['live']}}">
                                <input name="oid" type="hidden" value="{{$fields['oid']}}">
                                <input name="inv" type="hidden" value="{{$fields['inv']}}">                               

                                <div class="form-group">
                                <input name="ttl" type="hidden" value="{{$fields['ttl']}}" class="form-control" readonly="readonly">
                                </div>
                                <div class="form-group">
                                <input name="tel" type="hidden" value="{{$fields['tel']}}" class="form-control" readonly="readonly">
                                </div>
                                <div class="form-group">
                                <input name="eml" type="hidden" value="{{$fields['eml']}}" class="form-control" readonly="readonly">
                                </div>
                                <input name="vid" type="hidden" value="{{$fields['vid']}}">
                                <input name="curr" type="hidden" value="{{$fields['curr']}}">
                                <input name="p1" type="hidden" value="{{$fields['p1']}}">
                                <input name="p2" type="hidden" value="{{$fields['p2']}}">
                                <input name="p3" type="hidden" value="{{$fields['p3']}}">
                                <input name="p4" type="hidden" value="{{$fields['p4']}}">
                                <input name="cbk" type="hidden" value="{{$fields['cbk']}}">
                                <input name="cst" type="hidden" value="{{$fields['cst']}}">
                                <input name="lbk" type="hidden" value="{{$fields['lbk']}}">
                                <input name="crl" type="hidden" value="{{$fields['crl']}}">
                                <input name="hsh" type="hidden" value="{{$generated_hash}}">
                                <button type="submit" class="btn btn-sm btn-block btn-success">CREDIT & DEBIT CARDS </button>
                                <br/>
                                <div class="form-group">
                                <img src="/img/cards.png" width="100%" class="mt-2">
                                </div>
                              </form>
                           </div>
                       </div>
                   </div>
                   <!-- /Success Card -->

                   <div class="card success-card mt-2">
                       <div class="card-body">
                       	<h3 style="text-align: center; font-weight: 800; font-size: 20px;">Pay on Delivery</h3>
                       	<form action="/cod/{{$order->id}}" method="POST">
                          @csrf
                       		<input type="hidden" name="payment_gateway" value="Cash On Delivery">
                       		<button class="btn btn-sm btn-warning btn-block">COMPLETE</button>
                       	</form>
                       </div>
                   </div>

            </div>
	</div>
</div>
@endsection
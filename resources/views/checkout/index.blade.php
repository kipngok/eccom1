@extends('layouts.frontend')
@section('content')
<div class="container">
<form action="/order" method="POST">
    @csrf
<div class="row justify-content-center">
    <div class="col-sm-6 mb-5">
        <h4 style="font-weight: 800" class="mt-5">Billing & Shipping Details</h4>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{Auth::user()->name ?? ''}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{Auth::user()->email ?? ''}}" class="form-control @error('email') is-invalid @enderror">
            @error('email')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Location</label>
            <select name="place_id"  required="required" id="place_id" style="width: 100%">
                    <option value="">Select location</option>
            </select>
            <span style="font-size: 12px; color: #454647">Powered by Google Maps API</span>
            <input type="hidden" name="latitude" id="latitude" value="-1.2855855">
            <input type="hidden" name="longitude" id="longitude" value="36.8148359">
            @error('place_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div id="map" style="width: 100%; height: 300px;"></div>
        <div class="form-group">
            <label>Location Description <small>Eg. Tito aprtments, Ruiru road.</small> </label>
            <textarea name="location_description" class="form-control @error('location_description') is-invalid @enderror" rows="4">{{old('location_description')}}</textarea>
            @error('location_description')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Affiliate Code</label>
            <input type="text" name="affiliate_code" class="form-control" placeholder="Enter affiliate code here">
        </div>
        <button class="btn btn-sm btn-success btn-block mt-2">Proceed to payment <i class="fa fa-chevron-right"></i></button>
    </div>
    <div class="col-sm-6">
        <h4 style="font-weight: 800" class="mt-5">Your Order</h4>
        <table class="table table-bordered">
    		<thead>
        		<tr> 
                    <th>Image</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
        		</thead>
        		<tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td><a href="/sparepart/{{$item->model->slug}}" class="minicart-product-image"><img src="{{$item->model->firstImage}}" alt="cart products" width="50px"></a>
                        </td>
                        <td><a href="/sparepart/{{$item->model->slug}}">{{ $item->model->name }}</a></td>
                        <td>{{'Kes.'.number_format($item->model->effectivePrice)}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{ 'Kes. '.number_format($item->subtotal,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
		</table>
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
</div>
</form>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).on("change", "#place_id", function(){
    getCordinates();
});
</script>

<script src="{{ asset('js/google-maps.js') }}" defer></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXaPRG0e6fjjTTJ9Nj70ETRRz339jx6rY&callback=initMap&libraries=&v=weekly"
      async></script>

@endsection
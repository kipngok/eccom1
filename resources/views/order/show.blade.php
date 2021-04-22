@extends('layouts.app')
@section('content')
<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-table"></i> Order details</h4></div>
    </div>
    </div>

<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
		<table class="table table-bordered table-condensed">
			<tbody>
				<tr><th>Date</th> <td>{{date_format(date_create($order->created_at),"D dS m Y h:i:sa")}}</td></tr>
				<tr><th>Name</th> <td>{{$order->name}}</td></tr>
				<tr><th>Phone</th> <td>{{$order->phone}}</td></tr>
				<tr><th>Email</th> <td>{{$order->email}}</td></tr>
				<tr><th>Delivery Location</th> <td>{{$order->location_description}}</td></tr>
				<tr><th>Status</th> <td>{{$order->status}}</td></tr>
				<tr><th>Subtotal</th> <td>{{number_format($order->subtotal,2)}}</td></tr>
				<tr><th>Tax</th> <td>{{number_format($order->tax,2)}}</td></tr>
				<tr><th>Coupon code</th> <td>{{$order->discount_code}}</td></tr>
				<tr><th>Discount</th> <td>{{number_format($order->discount,2)}}</td></tr>
				<tr><th>Amount</th> <td>{{number_format($order->total,2)}}</td></tr>
				<tr><th>Is Paid?</th><td>@if($order->is_paid == 1) <i class="fa fa-check"></i> @else  <i class="fa fa-times"></i> @endif</td></tr>
				<tr><th>Payment Gateway</th><td>{{$order->payment_gateway}}</td></tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mt-3 mb-5">
	<div class="card-body">
	<legend style="font-weight: 800; font-size: 18px;">Delivery address</legend>
	<a href="https://www.google.com/maps/{{'@'.$order->latitude}},{{$order->longitude}},15z" target="_blank"><i class="fa fa-map"></i> Google maps Directions Link</a>
	<div id="map" style="width: 100%; height: 400px;"></div>
	</div>
</div>
	</div>
	<div class="col-sm-6">
		<div class="card mb-3">
			<div class="card-body">
				<h3 style="font-weight: 800; font-size: 18px;">Order Items</h3>
				<table class="table table-bordered">
    		<thead>
        		<tr>  
                    <th>Images</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
        		</thead>
        		<tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td><a href="/sparepart/{{$item->product->slug}}" class="minicart-product-image"><img src="{{$item->product->firstImage}}" alt="cart products" width="50px"></a>
                        </td>
                        <td><a href="/sparepart/{{$item->product->slug}}">{{ $item->product->name }}</a></td>
                        <td>{{'Kes.'.number_format($item->product->effectivePrice)}}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ 'Kes. '.number_format($item->amount,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
		</table>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="/order/{{$order->id}}" method="POST">
					@csrf
					@method('PUT')
					<legend style="font-weight: 800; font-size: 18px;">Update status of order</legend>
					<div class="form-group">
						<label>Set status</label>
						<select class="form-select" name="status">
							@if($order->status=='Pending')
							<option selected="selected">Pending</option>
							@else
							<option>Pending</option>
							@endif
							@if($order->status=='Delivery in progress')
							<option selected="selected">Delivery in progress</option>
							@else
							<option>Delivery in progress</option>
							@endif
							@if($order->status=='Completed')
							<option selected="selected">Completed</option>
							@else
							<option>Completed</option>
							@endif
						</select>
					</div>
					<button class="btn btn-sm btn-warning mt-2" type="submit">Update status</button>
				</form>
			</div>
		</div>
		<div class="card mt-3">
			<div class="card-body">
				@if(isset($order->rider_id))
				<h6>This order has been assigned to a rider for delivery</h6>
				<table class="table table-bordered">
					<tbody>
						<tr><th>Name</th><td>{{$order->rider->user->name}}</td></tr>
						<tr><th>Phone</th><td>{{$order->rider->user->phone}}</td></tr>
						<tr><th>Email</th><td>{{$order->rider->user->email}}</td></tr>
					</tbody>
				</table>
				@else
				<form action="/order/{{$order->id}}" method="POST">
					@csrf
					@method('PUT')
					<legend style="font-weight: 800; font-size: 18px;">Assign order to rider</legend>
					<input type="hidden" name="status" value="Delivery in progress">
					<div class="form-group">
						<label>Select rider</label>
						<select class="form-select" name="rider_id" required="required">
							<option value="">Select</option>
							@foreach($riders as $rider)
							<option value="{{$rider->id}}">{{$rider->user->name}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-sm btn-success mt-2">Assign order to Rider</button>
				</form>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
var lat={{$order->latitude}}, long={{$order->longitude}};
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: lat, lng: long};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXaPRG0e6fjjTTJ9Nj70ETRRz339jx6rY&callback=initMap&libraries=&v=weekly"
      async></script>
@endsection
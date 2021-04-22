@extends('layouts.app')
@section('content')

<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-table"></i>Orders </h4></div>
    </div>
    </div>

<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Date</th>
					<th>Name</th>
					<th>Status</th>
					<th>Subtotal</th>
					<th>Tax</th>
					<th>Coupon code</th>
					<th>Discount</th>
					<th>Amount</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{date_format(date_create($order->created_at),"D dS m Y h:i:sa")}}</td>
					<td>{{$order->name}}</td>
					<td>{{$order->status}}</td>
					<td>{{number_format($order->subtotal,2)}}</td>
					<td>{{number_format($order->tax,2)}}</td>
					<td>{{$order->discount_code}}</td>
					<td>{{number_format($order->discount,2)}}</td>
					<td>{{number_format($order->total,2)}}</td>
					<td><a href="/order/{{$order->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$orders->links()}}
	</div>
</div>

@endsection

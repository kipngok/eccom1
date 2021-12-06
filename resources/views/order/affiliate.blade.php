@extends('layouts.app')
@section('content')
<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-table"></i>Affiliate Earnings</h4></div>
    </div>
    </div>

<div class="row">
	<div class="col-sm-6">
		<div class="card mb-3">
			<div class="card-body">
				Hello <strong>{{Auth::user()->name}}</strong>, welcome to suki spares affiliate earnings. Your affiliate code is <strong>{{Auth::user()->affiliateCode}}</strong>. When a client checksout using your code, their order will automatically attached to your affiliate account. Funds in your affiliate account take <strong> 14 days to mature</strong> and will be remitted to your phone via mobile money on maturation.
			</div>
		</div>
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
					<th>Amount</th>
					<th>Affiliate Earning</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{date_format(date_create($order->created_at),"D dS m Y h:i:sa")}}</td>
					<td>{{$order->name}}</td>
					<td>{{$order->status}}</td>
					<td>Kes. {{number_format($order->total,2)}}</td>
					<td>Kes. {{number_format($order->total*0.05)}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$orders->links()}}
	</div>
</div>

@endsection

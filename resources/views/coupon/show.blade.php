@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-gift"></i> Coupon</h4></div>
</div>
</div>
<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
			<tbody>
				<tr>
					<th>Coupon code</th>
					<td>{{$coupon->code}}</td>
				</tr>
				<tr>
					<th>Type</th>
					<td>{{$coupon->type}}</td>
				</tr>
				<tr>
					<th>Value</th>
					<td>{{$coupon->value}}</td>
				</tr>
				<tr>
					<th>Expiry date</th>
					<td>{{$coupon->expiry_date}}</td>
				</tr>
			</tbody>
		</table>
		<form action="/coupon/{{$coupon->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/coupon/{{$coupon->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/coupon" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
	</div>
@endsection

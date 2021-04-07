@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/category/{{$coupons->id}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control" value="{{$coupons->code}}">
		</div>
		<div class="form-group">
	    <label>Type</label>
	    <input type="text" name="type" class="form-control" value="{{$coupons->type}}">
	    </div>
	    <div class="form-group">
	    <label>Value</label>
	    <input type="text" name="value" class="form-control" value="{{$coupons->value}}">
	    </div>
	    <div class="form-group">
	    <label>Expiry date</label>
	    <input type="date" name="expiry_date" class="form-control" value="{{$coupons->expiry_date}}">
	    </div>
	    <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
		</div>
	</div>
</div>

@endsection

@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-edit"></i> Edit Coupon</h4></div>
</div>
 </div>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/coupon/{{$coupon->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{$coupon->code}}">
		@error('code')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group">
	    <label>Type</label>
	    <select  name="type" class="form-select  @error('type') is-invalid @enderror">
	    	@if($coupon->type =='Percentage')
	    	<option selected="selected">Percentage</option>
	    	@else
	    	<option>Percentage</option>
	    	@endif

	    	@if($coupon->type =='Amount')
	    	<option selected="selected">Amount</option>
	    	@else
	    	<option>Amount</option>
	    	@endif
		</select>

	    @error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
	    </div>
	    <div class="form-group">
	    <label>Value</label>
	    <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{$coupon->value}}">
	    @error('value')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
	    </div>
	    <div class="form-group">
	    <label>Expiry date</label>
	    <input type="date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{$coupon->expiry_date}}">
	    @error('expiry_date')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/category/{{$coupons->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code') ?? $coupons->code}}">
		@error('code')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group">
	    <label>Type</label>
	    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type') ?? $coupons->type}}">
	    @error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
	    </div>
	    <div class="form-group">
	    <label>Value</label>
	    <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{old('value') ?? $coupons->value}}">
	    @error('value')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
	    </div>
	    <div class="form-group">
	    <label>Expiry date</label>
	    <input type="date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{old('expiry_date') ?? $coupons->expiry_date}}">
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

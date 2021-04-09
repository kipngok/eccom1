@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-plus"></i> Create</h4></div>
</div>
 </div>
<div class="container">
<div class="row">
	<div class="col-sm-6">
	@if ($errors->any())
    <div class="alert alert-danger mb-2">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
		<form action="/coupon" method="POST">
		@csrf
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control  @error('code') is-invalid @enderror" value="{{ old('code') }}">
		@error('code')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group">
		<label>Type</label>
		<input type="text" name="type" class="form-control  @error('type') is-invalid @enderror"> value="{{ old('type') }}"
		@error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group">
       	<label>Value</label>
        <input type="text" name="value" class="form-control  @error('value') is-invalid @enderror" value="{{ old('value') }}">
        @error('value')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
      	</div>
      	<div class="form-group">
       	<label>Expiry date</label>
       	<input type="date" name="expiry_date" class="form-control  @error('expiry_date') is-invalid @enderror" value="{{ old('value') ?? date('Y-m-d')}}">
       	@error('expiry_date')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
      	</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		<a href="/coupon" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>
@endsection

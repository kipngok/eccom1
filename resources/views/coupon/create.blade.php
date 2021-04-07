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
		{{csrf_field()}}
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control">
		</div>
		<div class="form-group">
		<label>Type</label>
		<input type="text" name="type" class="form-control">
		</div>
		<div class="form-group">
       	<label>Value</label>
        <input type="text" name="value" class="form-control">
      	</div>
      	<div class="form-group">
       	<label>Expiry date</label>
       	<input type="date" name="expiry_date" class="form-control" value="{{date('Y-m-d')}}">
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

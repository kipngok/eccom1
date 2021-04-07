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
		<form action="/make/{{$make->id}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Make</label>
		<input type="text" name="name" class="form-control" value="{{$makes->name}}">
		</div>
	    <div class="form-group">
	    <label>Order</label>
	    <input type="file" name="order" class="form-control" value="{{$makes->order}}">
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

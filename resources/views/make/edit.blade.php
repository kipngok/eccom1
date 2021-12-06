@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-edit"></i> Edit make</h4></div>
    </div>
    </div>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/make/{{$make->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Make</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$make->name}}">
		@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
	    <div class="form-group">
	    <label>Order</label>
	    <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{$make->order ?? 0}}">
	    @error('order')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
	    </div>
	    <div class="form-check">
	    	<input type="hidden" name="is_featured" value="0">
			  @if($make->is_featured == 1)
			  <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="defaultCheck1" checked="checked">
			  @else
			  <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="defaultCheck1">
			  @endif
			  <label class="form-check-label" for="defaultCheck1">
			    Is featured on frontpage
			  </label>
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

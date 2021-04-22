@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-plus"></i> Edit model</h4></div>
    </div>
    </div>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/model/{{$model->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Model</label>
		<input type="text" name="name" class="form-control @error('make_id') is-invalid @enderror" value="{{$models->name}}">
		@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
	     <div class="form-group">
		<label>Make</label>
		<select class="form-control @error('name') is-invalid @enderror" name="category_id">
    	 @foreach($makes as $make)
    	 <option value="{{$make->id}}">{{$make->name}}</option>
    	 @endforeach
      </select>
      @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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
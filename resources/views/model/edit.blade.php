@extends('layouts.app')
@section('content')
@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4><i class="fa fa-plus"></i> Edit model</h4></div>
    </div>
    </div>
    <!-- 'id','name','make_id'	 -->
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/model/{{$models->id}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Model</label>
		<input type="text" name="name" class="form-control" value="{{$models->name}}">
		</div>
	     <div class="form-group">
		<label>Make</label>
		<select class="form-control" name="category_id">
    	 @foreach($makes as $make)
    	 <option value="{{$make->id}}">{{$make->name}}</option>
    	 @endforeach
      </select>
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


@endsection

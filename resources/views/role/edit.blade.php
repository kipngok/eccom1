@extends('layouts.app')
@section('content')

<div class="page-header">
	<div class="row">
    <div class="col-sm-10"> <h4>Edit Role</h4></div>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-10">
		<form action="/role/{{$role->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Role name</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}">
		@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group">
		<label>Permission</label>
		@foreach($permissions->chunk(4) as $chunk)
    	<div class="row">
    	@foreach($chunk as $permission)
    	<div class="col-sm-3">
		<div class="custom-control custom-switch">
			@if($role->hasPermissionTo($permission->name))
			<input type="checkbox" class="custom-control-input" id="{{implode('-',explode(' ',$permission->name))}}" name="permissions[]" value="{{$permission->name}}" checked="checked">
			@else
			<input type="checkbox" class="custom-control-input" id="{{implode('-',explode(' ',$permission->name))}}" name="permissions[]" value="{{$permission->name}}">
			@endif
		  <label class="custom-control-label" for="{{implode('-',explode(' ',$permission->name))}}">{{ ucfirst($permission->name) }}</label>
		</div>
		</div>
		@endforeach
		</div>
		@endforeach
		</div>		
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>
@endsection

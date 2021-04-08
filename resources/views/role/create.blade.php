@extends('layouts.app')
@section('content')
<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4>Create Role</h4></div>
  	</div>
   </div>
<div class="container">
	<div class="row">
		<div class="col-sm-10">
		<form action="/role" method="POST">
		@csrf
		<div class="form-group">
		<label>Role</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
		@error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<strong>Permission</strong>
		@foreach($permissions->chunk(4) as $chunk)
    	<div class="row">
    	@foreach($chunk as $permission)
    	<div class="col-sm-3">
		<div class="custom-control custom-switch">
		  <input type="checkbox" class="custom-control-input @error('permission' is-invalid @enderror)" id="{{implode('-',explode(' ',$permission->name))}}" name="permissions[]" value="{{$permission->name}}">
		  @error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		  <label class="custom-control-label" for="{{implode('-',explode(' ',$permission->name))}}">{{ ucfirst($permission->name) }}</label>
		</div>
		</div>
		@endforeach
		</div>
		@endforeach
		</div>		
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		</div>
		</form>
		</div>
	</div>
</div>
@endsection

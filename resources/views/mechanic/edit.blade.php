@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/mechanic" method="POST">
			{{csrf_field()}}
				<div class="form-group">
				<label>Make</label>
				<select class="form-control" name="sub_category_id">
       			 @foreach($makes as $make)
        		<option value="{{$make->id}}">{{$make->name}}</option>
        		@endforeach
        		 </select>
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control" value="{{$mechanics->longitude}}">
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control" value="{{$mechanic->latitude}}">
				</div>
				<div class="form-group">
				<label>Mechanic</label>
				<select class="form-control" name="user_id">
       			 @foreach($users as $user)
        		<option value="{{$make->id}}">{{$user->name}}</option>
        		@endforeach
        		 </select>
				</div>
			<div class="form-group">
				<label>Approved</label>
				<input type="text" name="approved" class="form-control" value="{{$mechanics->approved}}">
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

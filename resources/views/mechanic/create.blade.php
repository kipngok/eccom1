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
     'id','location','latitude','longitude','make_id','status','approved','user_id'
    @endif
		<form action="/mechanic" method="POST">
			{{csrf_field()}}
				<div class="form-group">
				<label>Mechanic</label>
				<select class="form-control" name="user_id">
       			 @foreach($users as $user)
        		<option value="{{$user->id}}">{{$user->name}}</option>
        		@endforeach
        		 </select>
				</div>
				<div class="form-group">
				<label>Make</label>
				<select class="form-control" name="make_id">
       			 @foreach($makes as $make)
        		<option value="{{$make->id}}">{{$make->name}}</option>
        		@endforeach
        		 </select>
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control">
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control">
				</div>
				<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control">
				</div>
				<div class="form-group">
				<label>Status</label>
				<input type="text" name="status" class="form-control">
				</div>
			
			<div class="form-group">
				<label>Approved</label>
				<input type="text" name="approved" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
				<a href="/mechanic" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>
@endsection

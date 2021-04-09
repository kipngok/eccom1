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
		<form action="/mechanic" method="POST">
			@csrf
				<div class="form-group">
				<label>Mechanic</label>
				<select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
       			 @foreach($users as $user)
        		<option value="{{$user->id}}">{{$user->name}}</option>
        		@endforeach
        		 </select>
        		 @error('user_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Make</label>
				<select class="form-select @error('make_id') is-invalid @enderror" name="make_id[]" multiple>
       			 @foreach($makes as $make)
        			<option value="{{$make->id}}">{{$make->name}}</option>
        		 @endforeach
        		 </select>
        		 @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}">
				@error('longitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
				@error('latitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
				@error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Status</label>
				<input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
				@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
			
			<div class="form-group">
				<label>Approved</label>
				<input type="text" name="approved" class="form-control @error('approved') is-invalid @enderror" value="{{ old('approved') }}">
				@error('approved')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

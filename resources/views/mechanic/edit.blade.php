@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/mechanic/{{$mechanic->id}}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">

				<label>User</label>
				<select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
       			 	@foreach($users as $user)
       			 		@if($mechanic->user_id ==$user->id)
       			 		<option value="{{old('"') ?? $user->id}}" selected="selected">{{$user->name}}</option>
       			 		@else
       			 		<option value="{{old('">') ?? $user->id}}">{{$user->name}}</option>
       			 		@endif
        			@endforeach
        		 </select>
        		 @error('user_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>

				<div class="form-group">
				<label>Make</label>
				<select class="form-select @error('make_id') is-invalid @enderror" name="make_id[]" multiple>
       			 @foreach($makes as $make)
       			 	@if(in_array($make->id, explode(',', $mechanic->make_id)))
       			 	<option value="{{old('make_id') ?? $make->id}}" selected="selected">{{$make->name}}</option>
       			 	@else
       			 	<option value="{{old('make_id') ?? $make->id}}">{{$make->name}}</option>
       			 	@endif
        		 @endforeach
        		 </select>
        		  @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{old('longitude') ?? $mechanic->longitude}}">
				@error('longitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{old('latitude') ?? $mechanic->latitude}}">
				@error('latitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{old('location') ?? $mechanic->location}}">
				@error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
				<label>Status</label>
				<input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status') ?? $mechanic->status}}">
				@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
				<div class="form-group">
					<label>Approved</label>
					<input type="text" name="approved" class="form-control @error('approved') is-invalid @enderror" value="{{old('approved') ?? $mechanic->approved}}">
					@error('approved')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
				</div>
		 <div class="form-group">
			<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
	</div>
</div>
</div>
@endsection

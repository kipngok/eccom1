@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4> Edit</h4></div>
     </div>
    </div>
<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/rider/{{$rider->id}}" method="POST">
			@csrf
			<div class="form-group">
			<label>Rider</label>
			<select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
        	@foreach($users as $user)
        	<option value="{{old('user_id') ?? $user->id}}">{{$user->name}}</option>
        	@endforeach
        	</select>
        	 @error('user_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    		</div>
        	<div class="form-group">
			<label>Type</label>
			<input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type') ?? $rider->type}}">
			@error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			
			<div class="form-group">
				<label>Regstration no</label>
				<input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" value="{{old('reg_no') ?? $rider->reg_no}}" >
				@error('reg_no')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" class="form-control @error('city') is-invalid @enderror"  value="{{old('city') ?? $rider->city}}">
				@error('city')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" name="status" class="form-control @error('status') is-invalid @enderror"  value="{{old('status') ?? $rider->status}}">
				@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Longtitude</label>
				<input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror"  value="{{old('longitude') ?? $rider->longitude}}">
				@error('longitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror"  value="{{old('latitude') ?? $rider->latitude}}">
				@error('latitude')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Update</button>
				<a href="/rider" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>
@endsection

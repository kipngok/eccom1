@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-plus"></i> Create</h4></div>
     </div>
    </div>
<div class="container">
<div class="row mb-5">
	<div class="col-sm-6">
		<form action="/rider" method="POST">
			@csrf
				<div class="form-group">
			<label>Rider</label>
			<select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
        	@foreach($users as $user)
        	<option value="{{$user->id}}">{{$user->name}}</option>
        	@endforeach
        	</select>
        	@error('user_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        	<div class="form-group">
				<label>Type</label>
				<select name="type" class="form-select @error('type') is-invalid @enderror">
					<option>Car</option>
					<option>Motorcycle</option>
				</select>
				@error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			</div>
			<div class="form-group">
				<label>Regstration no</label>
				<input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" value="{{ old('reg_no') }}">
				@error('reg_no')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
				@error('city')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
            <label>Location</label>
            <select name="place_id"  required="required" id="place_id" style="width: 100%">
                    <option value="">Select location</option>
            </select>
            <span style="font-size: 12px; color: #454647">Powered by Google Maps API</span>
            <input type="hidden" name="latitude" id="latitude" value="-1.2855855">
            <input type="hidden" name="longitude" id="longitude" value="36.8148359">
            @error('place_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        	</div>
        	<div id="map" style="width: 100%; height: 300px;"></div>
        	<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-select @error('status') is-invalid @enderror">
					<option>Active</option>
					<option>Inactive</option>
				</select>
				@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group mt-2">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
				<a href="/make" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).on("change", "#place_id", function(){
    getCordinates();
});
</script>

<script src="{{ asset('js/google-maps.js') }}" defer></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXaPRG0e6fjjTTJ9Nj70ETRRz339jx6rY&callback=initMap&libraries=&v=weekly"
      async></script>

@endsection

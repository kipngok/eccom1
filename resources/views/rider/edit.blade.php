@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4> Edit</h4></div>
     </div>
    </div>
<div class="container">
<div class="row mb-5">
	<div class="col-sm-6">
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<form action="/rider/{{$rider->id}}" method="POST">
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
					@if($rider->type == 'Car')
					<option selected="selected">Car</option>
					@else
					<option>Car</option>
					@endif
					@if($rider->type == 'Motorcycle')
					<option selected="selected">Motorcycle</option>
					@else
					<option>Motorcycle</option>
					@endif
				</select>
				@error('type')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			</div>
			<div class="form-group">
				<label>Regstration no</label>
				<input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" value="{{$rider->reg_no}}" >
				@error('reg_no')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" class="form-control @error('city') is-invalid @enderror"  value="{{$rider->city}}">
				@error('city')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-select @error('status') is-invalid @enderror">
					@if($rider->status =='Active')
					<option selected="selected">Active</option>
					@else
					<option>Active</option>
					@endif
					@if($rider->status =='Inactive')
					<option selected="selected">Inactive</option>
					@else
					<option>Inactive</option>
					@endif
				</select>
				@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
            <label>Location</label>
            <select name="place_id" id="place_id" style="width: 100%">
                    <option value="">Select location</option>
            </select>
            <span style="font-size: 12px; color: #454647">Powered by Google Maps API</span>
            <input type="hidden" name="latitude" id="latitude" value="{{$rider->latitude}}">
            <input type="hidden" name="longitude" id="longitude" value="{{$rider->longitude}}">
            @error('place_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        	</div>
        	<div id="map" style="width: 100%; height: 300px;"></div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Update</button>
				<a href="/rider" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

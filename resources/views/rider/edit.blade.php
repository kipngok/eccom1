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
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<form action="/rider/{{$riders->id}}" method="POST">
			{{csrf_field()}}
				<div class="form-group">
			<label>Rider</label>
			<select class="form-control" name="user_id">
        	@foreach($users as $user)
        	<option value="{{$user->id}}">{{$user->name}}</option>
        	@endforeach
        	</select>
        	<div class="form-group">
				<label>Type</label>
				<input type="text" name="type" class="form-control" value="{{$riders->type}}">
			</div>
			</div>
			<div class="form-group">
				<label>Regstration no</label>
				<input type="text" name="reg_no" class="form-control" value="{{$riders->reg_no}}" >
			</div>
			<div class="form-group">
				<label>City</label>
				<input type="text" name="city" class="form-control"  value="{{$riders->city}}">
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" name="status" class="form-control"  value="{{$riders->status}}">
			</div>
			<div class="form-group">
				<label>Longtitude</label>
				<input type="text" name="longitude" class="form-control"  value="{{$riders->longitude}}">
			</div>
			<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control"  value="{{$riders->latitude}}">
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

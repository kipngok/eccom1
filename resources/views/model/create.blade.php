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
    @endif
		<form action="/model" method="POST">
			{{csrf_field()}}
		
		<div class="form-group">
		<label>Make</label>
		<select class="form-control" name="make_id">
        @foreach($makes as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group">
		<label>Model name</label>
		<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		<a href="/model" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>
@endsection

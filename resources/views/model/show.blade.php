@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
	<div class="col-sm-10"><h4>Model</h4></div>
    </div>
    </div>
	<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Model</th>
		<td>{{$models->name}}</td>
		</tr>
		<tr>
		<th>Make</th>
		<td>{{$models->make}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/model/{{$models->id}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/model/{{$models->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/model" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>
@endsection

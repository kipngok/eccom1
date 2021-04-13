@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Mechanic</h4></div>
</div>
</div>
<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
			<tbody>
				<tr>
					<th>Make</th>
					<td>{{$mechanic->name}}</td>
				</tr>
				<tr>
					<th>Location</th>
					<td>{{$mechanic->location}}</td>
				</tr>
				<tr>
					<th>Approved</th>
					<td>{{$mechanic->approved}}</td>
				</tr>
				<tr>
					<th>Status</th>
					<td>{{$mechanic->status}}</td>
				</tr>
			</tbody>
		</table>
		<form action="/mechanic/{{$mechanic->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/mechanic/{{$mechanic->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/mechanic" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>
@endsection

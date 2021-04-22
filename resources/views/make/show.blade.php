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
		<table class="table table-condensed table-striped table-bordered">
			<tbody>
				<tr>
					<th>Make</th>
					<td>{{$make->name}}</td>
				</tr>
				<tr>
					<th>Order</th>
					<td>{{$make->order}}</td>
				</tr>
				<tr>
					<th>Is featured</th>
					<td>@if($make->is_featured == 1) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</td>
				</tr>
			</tbody>
		</table>
		<form action="/make/{{$make->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/make/{{$make->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/make" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>
@endsection

@extends('layouts.app')
@section('content')

<div class="page-header">
<div class="row">
	<div class="col-sm-10"><h4>Spare requests</h4></div>
</div>
</div>
<div class="row">
	<div class="col-sm-12 over-flow">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Status</th>
					<th>Category</th>
					<th>Make & Model</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($spareRequests as $spareRequest)
				<tr>
					<td>{{$spareRequest->name}}</td>
					<td>{{$spareRequest->phone}}</td>
					<td>{{$spareRequest->email}}</td>
					<td>{{$spareRequest->status}}</td>
					<td>{{$spareRequest->category->name ?? ''}} >  {{$spareRequest->subCategory->name ?? ''}}</td>
					<td>{{$spareRequest->make->name ?? ''}} >  {{$spareRequest->model->name ?? ''}}</td>
					<td><a href="/spareRequest/{{$spareRequest->id}}" class="btn btn-sm btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="over-flow mt-5">
		{{$spareRequests->links()}}
	</div>
	</div>
</div>


@endsection

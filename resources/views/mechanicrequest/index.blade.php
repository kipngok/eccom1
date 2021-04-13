@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
    <div class="col-sm-10"><h4>Requests</h4></div>
  	 </div>
    </div>
  
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
			<thead>
				<tr> 
					<th>#</th> 
					<th>Name</th>
					<th>Make</th>
					<th>Model</th>
					<th>Created</th>
					<th>Action</th>
		        </tr>
			</thead>
			<tbody>
	       	 @foreach($mechanicrequests as $mechanicrequest) 
		        <tr>
			        <td>{{ ++$i }}</td>
			        <td>{{$mechanicrequest->user->name}}</td>
			        <td>{{$mechanicrequest->make->name}}</td>
			        <td>{{$mechanicrequest->make->model}}</td>
			        <td>{{$mechanicrequest->status}}</td>
			        <td>{{$product->created_at->format('d/m/Y')}}</td>
			        <td><a href="/mechanicrequest/{{$mechanicrequest->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
		        </tr>
		        @endforeach
	        </tbody>
		</table>
	</div>
</div>
</div>

@endsection

@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
    <div class="col-sm-10"><h4>Users</h4></div>
 	<div class="col-sm-2">
     <a href="/user/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add new</a>
 	</div>
  	 </div>
      </div>
	  <div class="container">
	  <div class="row">
	  <div class="col-sm-12 over-flow">
	  <table class="table table-bordered">
	 <thead>
	<tr>
	<th>#</th>
	<th>Name</th>
	<th>Email</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
  	<tr><td>{{ ++$i }}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td><a href="/user/{{$user->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
	</tr>
	@endforeach
				
			</tbody>
		</table>
		<div class="over-flow mt-5">
			{{$users->links()}}
		</div>
	</div>
</div>
</div>
@endsection

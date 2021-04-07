@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
    <div class="col-sm-10"><h4>Roles</h4></div>
 	<div class="col-sm-2">
     <a href="/role/create" class="btn btn-sm btn-warning"> <i class="fa fa-plus"></i> Add Role</a>
 	</div>
  	</div>
    </div>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
		<th>NO</th> 
		<th>Role name</th>
		<th>Action</th>
        </tr>
		</thead>
		<tbody>
        <?php  $i=1;?>
        @foreach($roles as $role) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$role->name}}</td>
        <td>
        <a href="/role/{{$role->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a>
    	</td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$roles->links()}}
	</div>
</div>
</div>

@endsection

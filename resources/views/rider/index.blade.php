@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Riders</h4></div>
     </div>
    </div>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Name</th>
        <th>Reg.No</th>
         <th>Type</th>
         <th>City</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($riders as $rider) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$rider->user->name}}</td>
        <td>{{$rider->reg_no}}</td>
        <td>{{$rider->type}}</td>
        <td>{{$rider->city}}</td>
        <td><a href="/rider/{{$rider->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$riders->links()}}
	</div>
</div>
</div>
@endsection

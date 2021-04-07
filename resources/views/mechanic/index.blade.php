@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4> Mechanics</h4></div>
</div>
</div>
<div class="container">
<div class="row">
	<div class="col-sm-12">
	<table class="table table-bordered">
	<thead>
	<tr> 
        <th>NO</th>  
        <th>Mechanic</th>
        <th>Location</th>
        <th>Approved</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
	</thead>
	<tbody>
        @foreach($mechanics as $mechanic) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$mechanic->user->name}}</td>
        <td>{{$mechanic->location}}</td>
        <td>{{$mechanic->approved}}</td>
        <td>{{$mechanic->status}}</td>
        <td><a href="/mechanic/{{$mechanic->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
	</table>
	</div>
</div>
</div>

@endsection

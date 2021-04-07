@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Model</h4></div>
<div class="col-sm-2">
<a href="/model/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Model</a>
    </div>
     </div>
    </div>
        <div class="container">
        <div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
	<!-- 'id','name','make_id'	 -->
        <tr> 
        <th>NO</th>  
        <th>Name</th>
        <th>Make</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($models as $model) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$model->name}}</td>
        <td>{{$model->makes->name}}</td>
        <td><a href="/model/{{$model->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$models->links()}}
	</div>
</div>
</div>

@endsection

@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Make</h4></div>
<div class="col-sm-2">
<a href="/make/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Make</a>
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
                    <th>Make</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
    		</thead>
    		<tbody>
            @foreach($makes as $make) 
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{$make->name}}</td>
                    <td>{{$make->order}}</td>
                    <td><a href="/make/{{$make->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
                </tr>
            @endforeach
            </tbody>
		</table>
        <div class="over-flow  mt-5 mb-5">
		{{$makes->links()}}
    </div>
	</div>
</div>
</div>

@endsection

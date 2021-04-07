@extends('layouts.app')
@section('content')

<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Sub category</h4></div>
<div class="col-sm-2">
<a href="/sub_category/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Category</a>
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
        <th>Category name</th>
        <th>Category</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sub_categories as $subcategory) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$subcategory->name}}</td>
        <td>{{$subcategory->category->name}}</td>
        <td><a href="/sub_category/{{$subcategory->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
        </table>
 
    </div>
</div>
</div>

@endsection

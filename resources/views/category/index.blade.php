@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Categories</h4></div>
<div class="col-sm-2">
<a href="/category/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Category</a>
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
                    <th>Slug</th>
                    <th>Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category) 
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->order}}</td>
                    <td><a href="/category/{{$category->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
</div>
</div>

@endsection

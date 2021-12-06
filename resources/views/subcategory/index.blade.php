@extends('layouts.app')
@section('content')

<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Sub category</h4></div>
<div class="col-sm-2">
<a href="/subCategory/create" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add Category</a>
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
            <th>Category name</th>
            <th>Category</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subCategories as $subCategory) 
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$subCategory->name}}</td>
            <td>{{$subCategory->category->name ?? ''}}</td>
            <td>{{$subCategory->slug}}</td>
            <td><a href="/subCategory/{{$subCategory->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <div class="over-flow mt-5">
        {{$subCategories->links()}}
    </div>
    </div>
</div>
</div>

@endsection

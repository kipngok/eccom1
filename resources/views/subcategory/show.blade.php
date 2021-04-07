@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Sub category</h4></div>
     </div>
    </div>
<div class="container">
        <div class="row">
        <div class="col-sm-6">
        <table class="table table-condensed table-striped table-bordered">
        <tbody>
        <tr>
        <th>Name</th>
        <td>{{$sub_categories->name}}</td>
        </tr>
        <tr>
        <th>Category</th>
        <td>{{$sub_categories->category->name}}</td>
        </tr>
        </tbody>
        </table>
        <form action="/sub_category/{{$sub_categories->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <div class="btn btn-group">
        <a href="/sub_category/{{$sub_categories->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
        <a href="/sub_category" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
        </div>
        </form>
        </div>
        </div>
        </div>

@endsection

@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Edit</h4></div>
     </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <form action="/category/{{$categorys->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
        <label>Category name</label>
        <input type="text" name="name" class="form-control" value="{{$categorys->name}}">
        </div>
        <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$categorys->slug}}">
        </div>
        <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" class="form-control" value="{{$categorys->order}}">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update
        </button>
        </div>
        </form>
        </div>
    </div>
</div>

@endsection

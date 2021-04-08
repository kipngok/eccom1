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
        <form action="/category/{{$category->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
        <label>Category name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $category->name}}">
        @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug') ?? $category->slug}}">
        @error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" class="form-control @error('order') is-invalid @enderror" value="{{old('order') ?? $category->order}}">
        @error('order')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Update</button>
        </div>
        </form>
        </div>
    </div>
</div>

@endsection

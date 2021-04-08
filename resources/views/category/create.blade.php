@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-plus"></i> Create</h4></div>
     </div>
    </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">
    <form action="/category" method="POST">
    @csrf

    <div class="form-group">
    <label>Category name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
    @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror">
    @error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Order</label>
    <input type="text" name="order" class="form-control @error('order') is-invalid @enderror">
    @error('order')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-sm btn-success">Save</button>
    <a href="/category" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    </form>
  </div>
</div>
</div>
@endsection

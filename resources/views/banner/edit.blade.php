@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <form action="/banner/{{$banner->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{$banners->title}}">
    </div>
    <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control" value="{{$banners->image}}">
    </div>
    <div class="form-group">
    <label>Url</label>
    <input type="file" name="url" class="form-control" value="{{$banners->url}}">
    </div>
    <div class="form-group">
    <label>Location</label>
    <input type="file" name="location" class="form-control"value="{{$banners->location}">
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

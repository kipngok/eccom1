@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <form action="/banner/{{$banner->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $banners->title}}">
    @error('title')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image') ?? $banners->image}}">
    @error('image')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Url</label>
    <input type="file" name="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url') ?? $banners->url}}">
    @error('url')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Location</label>
    <input type="file" name="location" class="form-control @error('location') is-invalid @enderror" value="{{old('location') ?? $banners->location}}">
    @error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

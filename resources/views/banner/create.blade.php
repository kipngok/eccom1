@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Banner</h4></div>
     </div>
    </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">    
    <form action="/banner" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        @error('title')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
          <label>Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
        @error('image')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Url</label>
        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
        @error('url')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}">
        @error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        <a href="/banner" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection

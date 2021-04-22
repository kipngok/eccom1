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
            <label>Heading</label>
            <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" value="{{old('heading')}}">
            @error('heading')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Sub Heading</label>
            <input type="text" name="subHeading" class="form-control @error('subHeading') is-invalid @enderror" value="{{old('subHeading')}}">
            @error('subHeading')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>  
            @error('content')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Location</label>
        <select name="location" class="form-select @error('location') is-invalid @enderror">
            <option>Slider</option>
            <option>Thumbnail Banner</option>
            <option>Side Menu Banner</option>
            <option>Stretch Banner</option>
        </select>
        @error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>

        <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option>Active</option>
            <option>Inactive</option>
        </select>
        @error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

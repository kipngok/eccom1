@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Edit Banner</h4></div>
     </div>
    </div>
<div class="container">
  <div class="row mb-5">
    <div class="col-sm-6">
    <form action="/banner/{{$banner->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $banner->title}}">
    @error('title')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Url</label>
    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url') ?? $banner->url}}">
    @error('url')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
            <label>Heading</label>
            <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" value="{{old('heading')?? $banner->heading}}">
            @error('heading')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Sub Heading</label>
            <input type="text" name="subHeading" class="form-control @error('subHeading') is-invalid @enderror" value="{{old('subHeading')?? $banner->subHeading}}">
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
            @if($banner->location == 'Slider')
            <option selected="selected">Slider</option>
            @else
            <option>Slider</option>
            @endif
            @if($banner->location == 'Thumbnail Banner')
            <option selected="selected">Thumbnail Banner</option>
            @else
            <option>Thumbnail Banner</option>
            @endif
            @if($banner->location == 'Side Menu Banner')
            <option selected="selected">Side Menu Banner</option>
            @else
            <option>Side Menu Banner</option>
            @endif
            @if($banner->location == 'Stretch Banner')
            <option selected="selected">Stretch Banner</option>
            @else
            <option>Stretch Banner</option>
            @endif
        </select>
        @error('location')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>

        <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @if($banner->status=='Active')
            <option selected="selected">Active</option>
            @else
            <option>Active</option>
            @endif

            @if($banner->status=='Inactive')
            <option selected="selected">Inactive</option>
            @else
            <option>Inactive</option>
            @endif

        </select>
        @error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
    <div class="form-group mt-2">
    <button type="submit" class="btn btn-sm btn-success">Update
    </button>
    </div>
    </form>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Partner</h4></div>
     </div>
    </div>
<div class="container">
<div class="row">
  <div class="col-sm-6">    
    <form action="/partner" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
         <div class="form-group">
        <label>Url</label>
        <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
        @error('url')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>

        <div class="form-group">
          <label>Logo</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}">
        @error('logo')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="10" id="description"></textarea>
    @error('description')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
        <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        <a href="/partner" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
{{-- name
slug
description
logo
       --}}   
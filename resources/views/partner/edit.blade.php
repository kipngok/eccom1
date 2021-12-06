@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Edit Partner</h4></div>
     </div>
    </div>
<div class="container">
  <div class="row mb-5">
    <div class="col-sm-6">
    <form action="/partner/{{$partner->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $partner->name}}">
    @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
     <div class="form-group">
    <label>Url</label>
    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url') ?? $partner->url}}">
    @error('url')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    <div class="form-group">
    <label>Logo</label>
    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
    @error('logo')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    </div>
    
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"></textarea>  
            @error('description')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

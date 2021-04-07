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
     @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/banner" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
    <!-- 'id','title','image','url','location' -->
         <div class="form-group">
           <label>Image</label>
          <input type="file" name="image" class="form-control">
          </div>
        <div class="form-group">
        <label>Url</label>
        <input type="text" name="url" class="form-control">
        </div>
        <div class="form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control">
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

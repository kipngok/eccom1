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
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
        @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$category->slug}}">
        @error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <label>Order</label>
        <input type="text" name="order" class="form-control @error('order') is-invalid @enderror" value="{{$category->order}}">
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

@section('scripts')
<script type="text/javascript">
function create_slug(){
    var str = $('#name').val().toLowerCase();
    var res = str.split(" ");
    var slug=res.join("-");
    $('#slug').val(slug);
}

$('#name').change(function(){
        create_slug();
        });
</script>
@endsection
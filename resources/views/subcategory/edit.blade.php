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
        <form action="/subCategory/{{$subCategory->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
         <div class="form-group">
   	 	<label>Name</label>
    	<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$subCategory->name}}">
        @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    	</div>
   		<div class="form-group">
		<label>Category</label>
		<select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
    	 @foreach($categories as $category)
         @if($category->id == $subCategory->category_id)
         <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
         @else
         <option value="{{$category->id}}">{{$category->name}}</option>
         @endif
     	@endforeach
     	 </select>
         @error('category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
        <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$subCategory->slug}}">
        @error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
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
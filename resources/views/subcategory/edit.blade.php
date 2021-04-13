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
    	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$$subCategory->name}}">
        @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
    	</div>
   		<div class="form-group">
		<label>Category</label>
		<select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
    	 @foreach($categories as $category)
     	<option value="{{$category->id}}">{{$category->name}}</option>
     	@endforeach
     	 </select>
         @error('category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

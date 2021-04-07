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
        <form action="/sub_category/{{$sub_categories->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
         <div class="form-group">
   	 	<label>Name</label>
    	<input type="text" name="name" class="form-control" value="{{$sub_categories->name}}"  >
    	</div>
   		<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
    	 @foreach($categories as $category)
     	<option value="{{$category->id}}">{{$category->name}}</option>
     	@endforeach
     	 </select>
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

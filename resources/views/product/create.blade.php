 @extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
    <div class="col-sm-10"><h4><i class="fa fa-plus"></i> Create product</h4>
    </div>
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
		<form action="/product" method="POST" enctype="multipart/form-data">
		 @csrf
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control">
		</div>
		<div class="row">
		<div class="col-sm-6">
		<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
        @foreach($category as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		</div>
		</div>	
		<div class="col-sm-6">
		<div class="form-group">
		<label>Sub category</label>
		<select class="form-control" name="sub_category_id">
        @foreach($subCategory as $subCategory)
        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
        @endforeach
         </select>
		</div>
		</div>	
		</div>
		<div class="row">
		<div class="col-sm-4">
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control">
		</div>
		</div>	
		<div class="col-sm-4">
		<div class="form-group">
		<label>Sale price</label>
		<input type="text" name="sale_price" class="form-control">
		</div>
		</div>
		<div class="col-sm-4">
		<div class="form-group">
		<label>Quantity</label>
		<input type="text" name="quantity" class="form-control">
		</div>
		</div>	
		</div>
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control">
		</div>
		<div class="form-group">
		<label>Product description</label>
		<textarea name="description" class="form-control"></textarea>
		</div>
		<div class="form-group">
		<label>Featured</label>
		<input type="text" name="featured" class="form-control">
		</div>
		<div class="row">
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file"  name="image1" class="form-control" id="image" placeholder="Upload image">

		</div>
	    </div>
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image2" class="form-control">
		</div>
		</div>
		</div>	
		<div class="row">
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image3" class="form-control">
		</div>	
		</div>
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image4" class="form-control">
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-sm-4">
		<div class="form-group">
		<label>Make</label>
		<select class="form-control" name="make_id">
        @foreach($make as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
		</div>
		</div>
		<div class="col-sm-4">
		<div class="form-group">
		<label>Model</label>
		<select class="form-control" name="model_id">
        @foreach($model as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
         </select>
		</div>
		</div>
		<div class="col-sm-4">
		<div class="form-group">
		<label>Year</label>
		<input type="text" name="year" class="form-control">
		</div>
		</div>	
		</div>
		<div class="form-group">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control">
		</div>
		<div class="form-group">
		<label>Fuel</label>
		<input type="text" name="fuel" class="form-control">
		</div>
		<div class="form-group">
		<label>Status</label>
		<input type="text" name="status" class="form-control">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save Product</button>
		<a href="/product" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
@endsection


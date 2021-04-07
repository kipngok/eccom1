@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/product/{{$product->id}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control" value="{{$product->name}}">
		</div>
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control" value="{{$product->slug}}">
		</div>
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control" value="{{$product->price}}">
		</div>
		<div class="form-group">
		<label>Selling price</label>
		<input type="text" name="sale_price" class="form-control" value="{{$product->sale_price}}">
		</div>
		<div class="form-group">
		<label>Product description</label>
		<textarea name="description" class="form-control" value="{{$product->description}}">
		{{$product->description}}	
		</textarea>
		</div>
		<div class="form-group">
		<label>Featured</label>
		<input type="text" name="featured" class="form-control" value="{{$product->featured}}">
		</div>
		<div class="form-group">
		<label>Quantity</label>
		<input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image1" class="form-control" value="{{$product->image1}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image2" class="form-control" value="{{$product->image2}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image3" class="form-control" value="{{$product->image3}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image4" class="form-control" value="{{$product->image4}}">
		</div>
		<div class="form-group">
		<label>Make</label>
		<select class="form-control" name="make_id">
        @foreach($make as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Model</label>
        <select class="form-control" name="model_id">
        @foreach($model as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group">
		<label>Year</label>
		<input type="text" name="year" class="form-control" value="{{$product->image4}}">
		</div>
		<div class="form-group">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control" value="{{$product->engine}}">
		</div>
		<div class="form-group">
		<label>Fuel</label>
		<input type="text" name="fuel" class="form-control" value="{{$product->fuel}}">
		</div>
		<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
        @foreach($category as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group">
		<label>Sub category</label>
		<select class="form-control" name="sub_category_id">
        @foreach($subCategory as $subCategory)
        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Status</label>
		<input type="text" name="status" class="form-control" value="{{$product->status}}">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>

@endsection

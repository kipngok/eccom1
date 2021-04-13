@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/product/{{$product->id}}" method="POST">
		@csrf
		<input type="hidden" name= "_method" value="PUT">
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
		@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-row">
		<div class="form-group col-sm-6">
		<label>Category</label>
		<select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        @error('category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-6">
		<label>Sub category</label>
		<div id="subCategories">
		<select class="form-control @error('sub_category_id') is-invalid @enderror" name="sub_category_id">
        @foreach($subCategories as $subCategory)
        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
        @endforeach
         </select>
     	</div>
         @error('sub_category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		
		<div class="form-row">
		<div class="form-group col-sm-4">
		<label>Price</label>
		<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">
		@error('price')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Sale price</label>
		<input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{$product->sale_price}}">
		@error('sale_price')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Quantity</label>
		<input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$product->quantity}}">
		@error('quantity')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>

		<div class="form-group">
		<label>Product description</label>
		<textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">
		{{$product->description}}	
		</textarea>
		@error('description')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-check">
			@if($product->featured ==1)
			<input class="form-check-input" type="checkbox" value="1" name="featured" id="featured" checked="checked">
			@else
			<input class="form-check-input" type="checkbox" value="1" name="featured" id="featured">
			@endif
		  	<label class="form-check-label" for="featured">
		    	Is Featured?
		 	</label>
		</div>

		<div class="form-row">
		<div class="form-group col-sm-6">
		<label>Image</label>
		<input type="text" name="image1" class="form-control @error('image1') is-invalid @enderror">
		@error('image1')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-6">
		<label>Image</label>
		<input type="text" name="image2" class="form-control @error('image2') is-invalid @enderror">
		@error('image2')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		<div class="form-row">
		<div class="form-group col-sm-6">
		<label>Image</label>
		<input type="text" name="image3" class="form-control @error('image3') is-invalid @enderror">
		@error('image3')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-6">
		<label>Image</label>
		<input type="text" name="image4" class="form-control @error('image4') is-invalid @enderror">
		@error('image4')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		<div class="form-row">
		<div class="form-group col-sm-6">
		<label>Make</label>
		<select class="form-control @error('make_id') is-invalid @enderror" name="make_id" id="make_id">
        @foreach($make as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
         @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-6">
		<label>Model</label>
		<div id="models">
        <select class="form-control @error('model_id') is-invalid @enderror" name="model_id">
        @foreach($model as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
        </select>
    	</div>
        @error('model_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		<div class="form-row">
		<div class="form-group col-sm-4">
		<label>Year</label>
		<input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{$product->image4}}">
		@error('year')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{$product->engine}}">
		@error('engine')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Fuel</label>
		<input type="text" name="fuel" class="form-control @error('fuel') is-invalid @enderror" value="{{$product->fuel}}">
		<select name="fuel" class="form-select @error('fuel') is-invalid @enderror">
			@if($product->fuel =='Petrol')
			<option selected="selected">Petrol</option>
			@else
			<option>Petrol</option>
			@endif

			@if($product->fuel =='Diesel')
			<option selected="selected">Diesel</option>
			@else
			<option>Diesel</option>
			@endif

			@if($product->fuel =='Electric')
			<option selected="selected">Electric</option>
			@else
			<option>Electric</option>
			@endif

		</select>

		@error('fuel')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>

		<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-select @error('status') is-invalid @enderror">
			@if($product->status == 'Active')
			<option selected="selected">Active</option>
			@else
			<option>Active</option>
			@endif

			@if($product->status == 'In Active')
			<option selected="selected">In Active</option>
			@else
			<option>In Active</option>
			@endif
		</select>
		@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{$product->slug}}" id="slug">
		@error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<label>Meta Description</label>
		<textarea type="text" name="meta" class="form-control @error('meta') is-invalid @enderror" id="meta">{{old('meta') ?? $product->meta}}</textarea>
		@error('meta')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>

@endsection

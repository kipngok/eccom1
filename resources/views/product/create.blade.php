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
		<form action="/product" method="POST" enctype="multipart/form-data">
		 @csrf
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name">
		@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="row g-2">
		<div class="form-group col">
		<label>Category</label>
		<select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        @error('category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col">
		<label>Sub category</label>
		<div  id="subCategories">
		<select class="form-select @error('sub_category_id') is-invalid @enderror" name="sub_category_id" id="sub_category_id">
        @foreach($subCategories as $subCategory)
        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
        @endforeach
         </select>
     	</div>
         @error('sub_category_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>	
		</div>
		<div class="row g-2">
		<div class="col-sm-4">
		<div class="form-group">
		<label>Price</label>
		<input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
		@error('price')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>	
		<div class="col-sm-4">
		<div class="form-group">
		<label>Sale price</label>
		<input type="number" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}">
		@error('sale_price')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		<div class="col-sm-4">
		<div class="form-group">
		<label>Quantity</label>
		<input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
		@error('quantity')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>	
		</div>

		<div class="form-group">
		<label>Product description</label>
		<textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="10" id="description"></textarea>
		@error('description')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-check">
  			<input class="form-check-input" type="checkbox" value="1" name="featured" id="featured">
		  	<label class="form-check-label" for="featured">
		    	Is Featured?
		 	</label>
		</div>

		<div class="row g-2">
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file"  name="image1" class="form-control @error('image1') is-invalid @enderror" value="{{ old('image1') }}" id="image" placeholder="Upload image">
		@error('image1')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror

		</div>
	    </div>
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror" value="{{ old('image2') }}">
		@error('image2')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		</div>	
		<div class="row g-2">
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image3" class="form-control @error('image3') is-invalid @enderror" value="{{ old('image3') }}">
		@error('image3')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>	
		</div>
		<div class="col-sm-6">
		<div class="form-group">
		<label>Image</label>
		<input type="file" name="image4" class="form-control @error('image4') is-invalid @enderror" value="{{ old('image4') }}">
		@error('image4')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>
		</div>
		<div class="row g-2">
		<div class="form-group col-sm-6">
		<label>Make</label>
		<select class="form-select @error('make_id') is-invalid @enderror" name="make_id" id="make_id">
			<option value="">Select make</option>
        @foreach($makes as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
         @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-6">
		<label>Model</label>
		<div id="models">
		<select class="form-select @error('model_id') is-invalid @enderror" name="model_id" id="model_id">
		<option value="">Select model</option>
        @foreach($models as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
         </select>
     	</div>
         @error('model_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>

		<div class="row g-2">
		<div class="form-group col-sm-4">
		<label>Year</label>
		<input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
		@error('year')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group col-sm-4">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control @error('engine') is-invalid @enderror" value="{{ old('engine') }}">
		@error('engine')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Fuel</label>
		<select name="fuel" class="form-select @error('fuel') is-invalid @enderror">
			<option>Petrol</option>
			<option>Diesel</option>
			<option>Electric</option>
		</select>
		@error('fuel')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		</div>

		<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-select @error('status') is-invalid @enderror">
			<option>Active</option>
			<option>In Active</option>
		</select>
		@error('status')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" id="slug">
		@error('slug')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		<div class="form-group">
		<label>Meta Description</label>
		<textarea type="text" name="meta" class="form-control @error('meta') is-invalid @enderror" id="meta">{{old('meta')}}</textarea>
		@error('meta')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
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

$('#description').change(function(){
        var description=$('#description').val().substring(0, 150);
		$('#meta').val(description);
        });
</script>

@endsection
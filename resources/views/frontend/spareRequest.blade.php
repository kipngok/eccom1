@extends('layouts.frontend')
@section('content')
<div class="container">
<div class="row justify-content-center">
	<div class="col-sm-8">
		@if (session('status'))
		<div class="alert alert-success mt-5">
			Your request was sent successfully. Our teans will contact you shortly to conform your request.
		</div>
		@endif
		<div class="card mt-5 mb-5">
			<div class="card-body">
				<h4 class="card-title" style="font-weight: 800;"> Request for spare part</h4>
				<h6 >All fields marked<span class="required">*</span> are required.</h6>
		<form action="/requestSpare" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="form-group">
            <label>Name<span class="required">*</span></label>
            <input type="text" name="name" value="{{Auth::user()->name ?? ''}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Email<span class="required">*</span></label>
            <input type="email" name="email" value="{{Auth::user()->email ?? ''}}" class="form-control @error('email') is-invalid @enderror">
            @error('email')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
        <div class="form-group">
            <label>Phone<span class="required">*</span></label>
            <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
        </div>
		<div class="row g-2">
		<div class="form-group col-sm-6">
		<label>Category</label>
		<select class="form-select" name="category_id" id="category_id">
			<option value="">Select Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group col-sm-6">
		<label>Sub category</label>
		<div  id="subCategories">
		<select class="form-select" name="sub_category_id" id="sub_category_id">
			<option value="">Select Sub Category</option>
         </select>
     	</div>
		</div>	
		</div>

		<div class="row g-2">
		<div class="form-group col-sm-4">
		<label>Make<span class="required">*</span></label>
		<select class="form-select @error('make_id') is-invalid @enderror" name="make_id" id="make_id">
			<option value="">Select make</option>
        @foreach($makes as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
         @error('make_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<div class="form-group col-sm-4">
		<label>Model<span class="required">*</span></label>
		<div id="models">
		<select class="form-select @error('model_id') is-invalid @enderror" name="model_id" id="model_id">
		<option value="">Select model</option>
         </select>
     	</div>
         @error('model_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
	{{-- 	<div class="form-group col-sm-4">
		<label>Chasis Number<span class="required">*</span></label>
		<div id="models">
		<select class="form-select @error('model_id') is-invalid @enderror" name="model_id" id="model_id">
		<option value="">Select model</option>
         </select>
     	</div>
         @error('model_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div> --}}
		<div class="form-group  col-sm-4">
		<label>Chasis Number</label>
		<input type="text" name="chassis_number" class="form-control @error('chassis_number') is-invalid @enderror" value="{{ old('chassis_number') }}">
		@error('chassis_number')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>

		</div>
		<div class="form-group">
			<label>Notes<span class="required">*</span></label>
			<textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
		</div>
		<div class="form-group">
		<label>Attach photo<span class="required">*</span></label>
		<input type="file"  name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" id="photo" placeholder="Upload photo">
		@error('photo')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
		</div>
		<button class="btn btn-sm btn-warning mt-2" type="submit">Request Spare</button>
		</form>
	</div>
</div>
	</div>
</div>
</div>
@endsection
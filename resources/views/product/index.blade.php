@extends('layouts.app')
@section('content')
	<div class="page-header">
	<div class="row">
    <div class="col-sm-10"><h4>Products</h4></div>
  	 </div>
    </div>
    <form action="/process" method="POST">
  	@csrf
	<input type="hidden" name="url" value="product">
	<div class="container">
	 <div class="row">
    <div class="col-sm-4 half">
  	<label>Select Category</label>
  	<select class="form-control" name="category">
  	<option value="All">All</option>
     @foreach($categories as $category)
     @if(isset($filters['category']) && $filters['category']==$category->id)
     <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
     @else
     <option value="{{$category->id}}">{{$category->name}}</option>
     @endif
     @endforeach
     </select>
  	</div>
  	 <div class="col-sm-4 half">
  	<label>Select Sub Category</label>
  	<select class="form-control" name="subCategory">
  	<option value="All">All</option>
     @foreach($subCategories as $subCategory)
     @if(isset($filters['category']) && $filters['subCategory']==$subCategory->id)
     <option value="{{$subCategory->id}}" selected="selected">{{$subCategory->name}}</option>
     @else
     <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
     @endif
     @endforeach
     </select>
  	</div>
  	<div class="col-sm-3 half">
    <button type="submit" class="btn btn-sm btn-success btn-block" style="margin-top:35px;">Filter</button>
  	</div>
    </div>	
	</div>
    </form>
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
		<th>NO</th> 
		<th>Image</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Category</th>
		<th>Created</th>
		<th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($products as $product) 
        <tr>
        <td>{{ ++$i }}</td>
        <td><img height="50" src="/public{{$product->getMedia('avatars')->first()->getUrl()}}"></td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->created_at->format('d/m/Y')}}</td>
        <td><a href="/product/{{$product->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
	</div>
</div>
</div>

@endsection

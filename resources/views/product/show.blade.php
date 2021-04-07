@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Product</h4></div>
     </div>
    </div>

<div class="container">
    <div class="row">
    <div class="col-sm-6">
    <table class="table table-condensed table-striped table-bordered">
    <tbody>
    <tr>
    <th>Product name</th>
    <td>{{$product->name}}</td>
    </tr>
    <tr>
    <th>Slug</th>
    <td>{{$product->slug}}</td>
    </tr>
    <tr>
    <th>Price</th>
    <td>{{$product->price}}</td>
    </tr>
     <tr>
    <th>Sale pricce</th>
    <td>{{$product->sale_price}}</td>
    </tr>
    <tr>
    <th>Description</th>
    <td>{{$product->description}}</td>
    </tr>
    <tr>
    <th>Featured</th>
    <td>{{$product->featured}}</td>
    </tr>
     <tr>
    <th>Quantity</th>
    <td>{{$product->quantity}}</td>
    </tr>
    <tr>
    <th>Make</th>
    <td>{{$product->make->name}}</td>
    </tr>
    <tr>
    <th>Model</th>
    <td>{{$product->model->name}}</td>
    </tr>
     <tr>
    <th>Year</th>
    <td>{{$product->year}}</td>
    </tr>
    <tr>
    <th>Engine</th>
    <td>{{$product->engine}}</td>
    </tr>
    <tr>
    <th>Fuel</th>
    <td>{{$product->fuel}}</td>
    </tr>
     <tr>
    <th>Category</th>
    <td>{{$product->category->name}}</td>
    </tr>
     <tr>
    <th>Sub Category</th>
    <td>{{$product->subCategory->name}}</td>
    </tr>
    <tr>
    <th>Status</th>
    <td>{{$product->status}}</td>
    </tr>
    </tbody>
    </table>
    <form action="/product/{{$product->id}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
    <div class="btn btn-group">
    <a href="/product/{{$product->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
    <a href="/product" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    </form>
    </div>
    <div class="col-sm-6">
    <table>
    @foreach ($products as $product)
    @foreach ($product->getMedia('avatars') as $image)
    <tr>
    <td>
    <img src="{{asset($image->getUrl()) }}"> 
    </td>
    </tr>
    @endforeach
    @endforeach
   <!--  <tr>
    <td><img src="/public{{$product->getMedia('avatars')->first()->getUrl()}}" ></td>
    </tr> -->
    </table>
    </div>
    </div>
    </div>
@endsection

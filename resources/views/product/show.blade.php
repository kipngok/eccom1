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

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->make->name}}</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->model->name}}</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->category->name}}</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->subCategory->name}}</li>
  </ol>
</nav>

<div id="custCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- slides -->
    <div class="carousel-inner">
        <?php $x=0;?>
        @foreach ($product->getMedia('products') as $image) 
        <div class="carousel-item @if($x == 0) active @endif"> <img src="{{asset($image->getUrl())}}" class="d-block w-100"> </div>
        <?php $x++;?>
        @endforeach
    </div> 
    <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-bs-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> 
    <a class="carousel-control-next" href="#custCarousel" data-bs-slide="next"> <span class="carousel-control-next-icon"></span> </a>

    <!-- Thumbnails -->
    <ol class="carousel-indicators list-inline">
        <?php $x=0;?>
        @foreach ($product->getMedia('products') as $image) 
        <li class="list-inline-item  @if($x == 0) active @endif"> <a id="carousel-selector-0" class="selected" data-bs-slide-to="{{$x}}" data-bs-target="#custCarousel"> <img src="{{asset($image->getUrl())}}" class="img-fluid"> </a> </li>
        <?php $x++;?>
        @endforeach
    </ol>
</div>
    </div>
    <div class="col-sm-6">
        <h1 style="font-weight: 600;">{{$product->name}}</h1>
        <div class="row mb-3">
            <div class="col-sm-6" style=" padding: 0px;" >
        @if($product->quantity >0)
        <div class="badge badge-success">In stock: {{$product->quantity}}</div><br>
        @else
        <div class="badge badge-danger">Out of stock</div><br>
        @endif
        </div>
            <div class="col-sm-6" style="text-align: right; padding: 0px; padding-right: 50px;">
                <span class="rating">
                    @for($i=0; $i<5; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </span>
            </div> 
        </div>

        @if(isset($product->sale_price))
        <h4 style="font-weight: 800; color: #FDB819;"><small>Kes. </small>{{number_format($product->sale_price,2)}}</h4>
        <h6 style="text-decoration: line-through;"><small>Kes. </small>{{number_format($product->price,2)}}</h6>
        @else
        <h4 ><small>Kes. </small>{{number_format($product->price,2)}}</h4>
        @endif
        <div class="row">
        <div class="col-sm-12" style="padding: 0px;"> 
        {{$product->description}}
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <i class="fa fa-plus"></i> Fuel: {{$product->fuel}}<br>
                <i class="fa fa-plus"></i> Year: {{$product->year}}<br>
                <i class="fa fa-plus"></i> Engine size: {{$product->engine}}</div>
        </div> 

        <form action="/product/{{$product->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <div class="btn btn-group">
        <a href="/product/{{$product->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
        <a href="/product" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection

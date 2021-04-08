@extends('layouts.frontend')
@section('content')


  <div class="card">
  <div class="card-body">
 
  <div class="row">
  <div class="col-md-4">
  <h1>Hello</h1>


  </div>
  <div class="col-md-8">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('img/2.jpg') }}" width="80px" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('img/3.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
     <img class="d-block w-100" src="{{ asset('img/3.jpg') }}" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </div>   
  </div>  


  </div>
  </div> 
<!-- ------ New Arrivals-------- -->
<div class="row">
  <div class="col-md-3">
    
  </div>
  <div class="col-md-9">
  <div class="card">
  <div class="card-header">
    NEW ARRIVALS
  </div>
  <!--product card -->
  <div class="row">
  @foreach ($products as $product1)
  <div class="text-center" style="margin-top: 5px;">
  <a  href="/productss/{{$product1->slug}}"><img height="100px" src="/public{{$product1->getMedia('avatars')->first()->getUrl()}}"></a>
  <div class="card-body"><br>
  <a class="product_name" href="" style="color: #000">{{ $product1->name }}</a><br>
  <span class="new-price">Ksh {{ $product1->sale_price }} </span>
  <form action="" method="POST" class="cart-quantity">
  @csrf
 <input type="hidden" name="quantity" id="quantity" value="1">
 <input type="hidden" name="id" id="id" value="{{$product1->id}}">
 <input type="hidden" name="name" id="name" value="{{$product1->name}}">
 <input type="hidden" name="price" id="price" value="{{$product1->price}}">
  <div class="container">
  <div class="row">
    <button class="btn btn-warning" type="submit" id="addToCart">Add to cart</button>
 </div>
  </div> 
 

 </form>
  </div>
  </div>
  @endforeach
  </div>
  </div>

  </div>
  
</div>

  <!-- ------------Featured--------------------- -->
 <div class="card">
  <div class="card-header">
  POPULAR PRODUCTS
  </div>

<div class="row">
  @foreach ($products as $product1)
  <div class="card text-center">
  <img height="200" src="/public{{$product1->getMedia('avatars')->first()->getUrl()}}">
  <div class="card-body"><br>
  <a class="product_name" href="" style="color: #000">{{ $product1->name }}</a><br>
  <span class="new-price">Ksh {{ $product1->sale_price }} </span>
  <form action="" method="POST" class="cart-quantity">
  @csrf
<div class="row">
 <input type="hidden" name="quantity" id="quantity" value="1">
 <input type="hidden" name="id" id="id" value="{{$product1->id}}">
 <input type="hidden" name="name" id="name" value="{{$product1->name}}">
 <input type="hidden" name="price" id="price" value="{{$product1->price}}">
 <button class="btn btn-warning" type="submit" id="addToCart">Add to cart</button>
 </div>

 </form>
  </div>
  </div>
  @endforeach
  </div>
  </div>

  <!-- ------TABs------------- -->
  <div>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">TOYOTA PRODUCTS</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">NISSAN PRODUCTS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">SUBARU PRODUCTS</a>
  </li>
 
</ul>
  </div>

  <!-------Footer  -->

@include('includes.footer')


@endsection
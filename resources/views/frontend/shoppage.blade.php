@extends('layouts.frontend')
@section('content')
<div class="container">
<div class="row">
<div class="col-sm-3">
  Category menu
</div>
<div class="col-sm-9">
 <div class="row" style="margin-right: 20px; ">
  @foreach ($products as $product1)
  <div style="text-align: center;">
  <a  href="/productss/{{$product1->slug}}"><img height="200" src="/public{{$product1->getMedia('avatars')->first()->getUrl()}}"></a>
  <div class="card-body"><br>
  <div class="row">
  <a class="product_name" href="/productss/{{$product1->slug}}" style="color: #000">{{ $product1->name}}</a>
  </div>
  <span class="new-price">Ksh {{ $product1->sale_price }}</span>
  <form action="" method="POST" class="cart-quantity">
  @csrf
  <div class="row">
 <input type="hidden" name="quantity" id="quantity" value="1">
 <input type="hidden" name="id" id="id" value="{{$product1->id}}">
 <input type="hidden" name="name" id="name" value="{{$product1->name}}">
 <input type="hidden" name="price" id="price" value="{{$product1->price}}">
 <div class="row">
  <div class="col-sm-12">
  <button class="btn btn-warning" type="submit" id="addToCart">Add to cart</button>
  </div>  
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


@include('includes.footer')
@endsection

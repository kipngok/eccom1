@extends('layouts.frontend')

@section('content')
<div class="container">
<div class="row g-3">
    <div class="col-sm-3">
        <x-categories-menu :categories="$categories" class="card shadow-sm no-mobile"></x-categories-menu>
    </div>
    <div class="col-sm-6">
<div id="homeSlider" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php $x=0; ?>
    @foreach($sliders as $slider)
        <div class="carousel-item @if($x<=0) active @endif">
          <img class="d-block w-100 img-responsive" src="{{ $slider->getMedia('banners')->first()->getUrl() }}" alt="{{$slider->title}}">
          <div class="caption"> 
          @if(isset($slider->heading))<h1 class="animate__animated animate__bounceInDown">{{$slider->heading}}</h1>@endif
          @if(isset($slider->subHeading))<h3 class="animate__animated animate__flipInX">{{$slider->subHeading}}</h3>@endif
          @if(isset($slider->content))<p class="animate__animated animate__flipInX">{{$slider->content}} </p>@endif
          @if(isset($slider->url))<a href="{{$slider->url}}" class="btn btn-md btn-warning animate__animated animate__backInRight"><i class="fa fa-cart-plus"></i> BUY NOW</a>@endif
          </div>
        </div>
    <?php $x++;?>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#homeSlider" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#homeSlider" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="col-sm-3 no-mobile">
        @foreach($thumbBanners as $banner)
        <div class="thumb-banner">
            <div class="thumb-caption">
            <h5>{{$banner->heading}}</h5>
            <h6>{{$banner->subHeading}}</h6>
            <a href="{{$banner->url}}" class="btn btn-sm btn-warning">SHOP NOW</a>
            </div>
            <img src="{{ $banner->getMedia('banners')->first()->getUrl() }}" width="100%" align="{{$banner->title}}">
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
<h4 class="section-heading" class="mt-3" style="margin-top: 10px;"><i class="fa fa-table"></i> NEW ARRIVALS</h4>
</div>
</div>

<div class="row mb-5 g-3 owl-carousel owl-theme">
    @foreach($newProducts as $newProduct)
    <x-product-thumbnail :product="$newProduct" class="col-sm-6 col-md-4 col-lg-3 item"></x-product-thumbnail>
    @endforeach
</div>

<div class="row">
    <div class="col-sm-12">
<h4 class="section-heading" class="mt-3"><i class="fa fa-table"></i> FEATURED PRODUCTS</h4>
</div>
</div>
<div class="row mb-5 g-3 owl-carousel owl-theme">
    @foreach($featuredProducts as $featuredProduct)
    <x-product-thumbnail :product="$featuredProduct" class="col-sm-6 col-md-4 col-lg-3 item"></x-product-thumbnail>
    @endforeach
</div>
@if(isset($stretchBanner))
<div class="row mb-3 no-mobile">
    <div class="col-sm-12">
      <img src="{{ $stretchBanner->getMedia('banners')->first()->getUrl() }}" width="100%">
    </div>
  </div>
@endif
<div class="row">
<div class="col-sm-12">
<h4 class="section-heading" class="mt-3"><i class="fa fa-table"></i> POPULAR CAR MODELS</h4>
</div>
</div>
<div class="row mb-5">
    <div class="col-sm-12">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<?php $x=0; ?>
@foreach($featuredMakes as $make)
<li class="nav-item" role="presentation">
    <button class="nav-link @if($x<=0) active @endif" id="D{{$make->id}}-tab" data-bs-toggle="tab" data-bs-target="#D{{$make->id}}" type="button" role="tab" aria-controls="D{{$make->id}}" aria-selected="false">{{$make->name}}</button>
  </li>
<?php $x++;?>
@endforeach
</ul>
<div class="tab-content" id="myTabContent">
<?php $x=0; ?>
@foreach($featuredMakes as $make)
<div class="tab-pane @if($x<=0) active @endif" id="D{{$make->id}}" role="tabpanel" aria-labelledby="D{{$make->id}}-tab">
  <div class="row g-3 mt-1"> 
    @foreach($make->products()->take(4)->get() as $makeProduct)
    <x-product-thumbnail :product="$makeProduct" class="col-sm-6 col-md-4 col-lg-3 half"></x-product-thumbnail>
    @endforeach
</div>
</div>
<?php $x++;?>
@endforeach
</div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                nav:false,
                dots:false,
                responsive: {
                              0: {
                                items: 2
                              },
                              600: {
                                items: 3
                              },
                              1000: {
                                items: 5
                              }}
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>
@endsection
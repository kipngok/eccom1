@extends('layouts.frontend')
@section('content')
<div class="container">
<div class="row">
  <div class="col-sm-3"><x-categories-menu :categories="$categories" class="card mt-3 shadow-sm no-mobile"></x-categories-menu>
  @if(isset($sideBanner))
    <img src="{{ $sideBanner->getMedia('banners')->first()->getUrl() }}" width="100%" class="mt-3 no-mobile">
  @endif
</div>
  <div class="col-sm-9">
    <div class="row mt-4">
    <div class="col-sm-6">
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->make->name}}</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->model->name}}</li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->category->name}}</li>
    <li class="breadcrumb-item active" aria-current="page"><a href="/sparepart/category/{{$product->subCategory->slug}}"> {{$product->subCategory->name}}</a></li>
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
                <span class="rating-x">
                    @for($i=0; $i<$product->rating; $i++)
                        <i class="fa fa-star" style="color: #FDB819;"></i>
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
          <div class="col-sm-12">
            <form action="" method="POST" class="form form-inline">
            @csrf
            <div class="input-group">
            <input type="number" name="quantity" class="form-control" id="quantity" value="1" min="1" max="{{$product->quantity}}" style="max-width: 90px;">
            <input type="hidden" name="id" id="id" value="{{$product->id}}">
            <input type="hidden" name="name" id="name" value="{{$product->name}}">
            <input type="hidden" name="price" id="price" value="{{$product->price}}">
            <button class="btn btn-md btn-warning addToCart" type="submit"><i class="fa fa-plus"></i> Add to cart</button>
            </div>
            </form>
          </div>
        </div>
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

    </div>
    </div>
    
    <h4 style="font-weight: 800;" class="mt-5">Similar Spares</h4>
    <div class="row g-2 mb-3 owl-carousel owl-theme">
      @foreach($similarProducts as $similarProduct)
      <x-product-thumbnail :product="$similarProduct" class="col-sm-6 col-md-4 col-lg-3 item"></x-product-thumbnail>
      @endforeach
    </div>


    <div class="row g-2 mb-5 reviews">
      <div class="col-sm-6">
        @foreach($reviews as $review)
        <div class="card review mb-2">
          <div class="card-body p-2">
          <span class="review-user">{{$review->user->name}}</span>
          <span class="review-date">{{date_format(date_create($review->created_at),'D dS m Y h:i:sa')}}</span>
          <p>{{$review->review}}</p>
          <span class="rating-x">
            @for($i=0; $i<$review->rating; $i++)
                <i class="fa fa-star"></i>
            @endfor
          </span>
          </div>
        </div>
        @endforeach
        {{$reviews->links()}}
      </div>
      <div class="col-sm-6">
        @if(isset(Auth::user()->id))
        <h4 style="font-weight: 800">Enter your review</h4>
        <form action="/review" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{$product->id}}">
          <div class="form-group">
            <input type="number" name="rating" class="rating" value="0">
          </div>
          <div class="form-group">
            <label>Write a short review</label>
            <textarea name="review" class="form-control" rows="7"></textarea>
          </div>
          <button type="submit" class="btn btn-sm btn-warning">Submit review</button>
        </form>
        @else
        <div class="alert alert-dark">
          <a href="/login">Login</a> to post a review.
        </div>
        @endif
      </div>
    </div>

    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
      $(document).ready(function(){
        $('.rating').rating();
      });
</script>

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
                                items: 4
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

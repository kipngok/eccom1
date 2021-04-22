<a href="/sparepart/{{$product->slug}}" {{ $attributes }} style="text-decoration: none;">
    <div class="card product-thumb shadow-sm "> 
     @if(isset($product->sale_price))
     <span class="sale-offer"> Save {{number_format(($product->price - $product->sale_price)/$product->price *100)}}%</span>
     @endif
    <img height="200" src="{{$product->firstImage}}" class="card-image">
  <div class="card-body">
  <span class="thumb-category">{{$product->category->name}} > {{$product->subCategory->name}}</span>
  <h4 class="card-title">{{$product->name}}</h4>
  @if(isset($product->sale_price))
  <span class="new-price"><small>Kes</small> {{ number_format($product->sale_price) }}</span>
  <span class="old-price"><small>Kes</small> {{ number_format($product->price) }}</span>
  @else
  <span class="new-price"><small>Kes</small> {{ number_format($product->price) }}</span>
  @endif
  
  <form action="" method="POST">
  @csrf
 <input type="hidden" name="quantity" id="quantity" value="1">
 <input type="hidden" name="id" id="id" value="{{$product->id}}">
 <input type="hidden" name="name" id="name" value="{{$product->name}}">
 <input type="hidden" name="price" id="price" value="{{$product->price}}">
  <button class="btn btn-sm btn-warning btn-block addToCart" type="submit"><i class="fa fa-plus"></i> Add to cart</button>
  </form>
  </div>
</div>
</a>
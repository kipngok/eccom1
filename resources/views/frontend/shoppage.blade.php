@extends('layouts.frontend')
@section('content')
<div class="row">
<div class="col-sm-3">
<x-categories-menu :categories="$categories"></x-categories-menu>
</div>
<div class="col-sm-9 p-0">
 <div class="row g-3" style="margin-right: 20px; ">
  @foreach ($products as $product)
  <x-product-thumbnail :product="$product"></x-product-thumbnail>
  @endforeach
  </div>
</div>
</div>
@endsection

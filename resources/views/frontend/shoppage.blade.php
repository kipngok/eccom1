@extends('layouts.frontend')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-3">
<x-categories-menu :categories="$categories" class="card mt-3 shadow-sm no-mobile"></x-categories-menu>
@if(isset($sideBanner))
<img src="{{ $sideBanner->getMedia('banners')->first()->getUrl() }}" width="100%" class="mt-3 no-mobile">
@endif
</div>
<div class="col-sm-9 p-0">
	<div class="row mb-3 mt-3">
		<div class="col-sm-12">
			<form action="/filter" method="POST" class="filters">
				@csrf
				<legend style="font-weight: 800; font-size: 18px; margin: 0px;">Filter products</legend>
				<div class="row">
					<div class="col-sm-2 form-group half">
						<label>Make</label>
						<select class="form-select" name="make_id" id="make_id">
							<option value="All">Select Make</option>
							@foreach($makes as $make)
							<option value="{{$make->id}}">{{$make->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-2 form-group half">
						<label>Model</label>
						<div id="models">
						<select class="form-select" name="model_id" id="model_id">
							<option value="All">Select Model</option>
						</select>
						</div>
					</div>
					<div class="col-sm-2 form-group half">
						<label>Year</label>
						<select name="year" class="form-select">
							<option value="All">Select</option>
						@for($i=2000; $i<date('Y'); $i++)
						<option value="{{$i}}">{{$i}}</option>
						@endfor
						</select>
					</div>
					<div class="col-sm-2 form-group half">
						<label>Engine Size</label>
						<select name="engine" class="form-select">
							<option value="All">Select</option>
						@for($i=500; $i<10000; $i+=100)
						<option value="{{$i}}">{{$i}}CC</option>
						@endfor
						</select>
					</div>
					<div class="col-sm-2 form-group half">
						<label>Chassis number</label>
							<input type="text" name="chassis_number" class="form-control" >
						</div>
		
					<div class="col-sm-2">
						<button type="submit" class="btn btn-md btn-warning mt-4"><i class="fa fa-filter"></i> Filter</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@if ($products->isEmpty())
   <div class="row g-3">
	<div class="col-sm-12" style="text-align:center;">
		<p>The item you are looking for is currently not in the system. Kindly click on the link below to
request for the spare part or use the filters above to search for another product</p>
<a href="/requestSpare" class="btn btn-sm btn-warning">Request for spare</a>
	</div>
</div>
@else
     <div class="row g-3" style="margin-right: 20px; ">
  @foreach ($products as $product)
  <x-product-thumbnail :product="$product" class="col-sm-6 col-md-4 col-lg-3 half"></x-product-thumbnail>
  @endforeach
  </div>
@endif


  <div class="over-flow  mt-5">
  {{$products->links()}}
</div>
</div>
</div>
</div>
@endsection

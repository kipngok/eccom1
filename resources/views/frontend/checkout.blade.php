@extends('layouts.frontend')
@section('content')
<header></header>
<div class="container">
<h1 class="checkout-heading stylish-heading">Checkout</h1>
<div class="row">
<div class="col-md-6">
<h1>Billing Details</h1>
<form>
	<div class="form-group">
    <label >Email Address</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">City</label>
      <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group col-md-6">
      <label>County</label>
      <input type="text" name="county" class="form-control" id="inputPassword4">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Postal code</label>
      <input type="text" class="form-control" name="postal">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone</label>
      <input type="password" class="form-control" name="phone">
    </div>
  </div>
  
  <div class="form-group">
    
    <input type="submit" value="Proceed to payment" class="form-control btn btn-success" name="email">
  </div>
</form>
	
</div>
<div class="col-md-6">
	
</div>
	
</div>
	
</div>

@include('includes.footer')
@endsection
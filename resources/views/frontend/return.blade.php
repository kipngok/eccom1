@extends('layouts.frontend')
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5">
		<div class="col-sm-8">
			<h4 class="mb-2" style="font-weight: 800;">Return Policy</h4>
<div class="accordion accordion-flush" id="accordion">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Return Policy
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion">
      <div class="accordion-body">
      	<ol>
      		<li> Login and go to ORDERS Then click on the order of the item(s) you wish to return</li>
			<li> Select the number of items you wish to return, the reason of the return and give us more details to help us identify the issue with the product</li>
			<li> Select your preferred refund method (click here to know more about the refund possibilities)</li>
			<li> Choose your ideal return process : Return the item yourself to one of our eligible drop-off stations or let us handle it by picking-up the item from you</li>
			<li> Check your information and submit your return request</li>
      	</ol>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
       Enjoy An Easy Return And Refund Online Policy
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordion">
      <div class="accordion-body">You Have up to 15 days for eligible items to make a return request after your order has been delivered</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Prepare the Item 
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordion">
      <div class="accordion-body">Place the item in its original packaging, including any accessories, tags, labels or freebies.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
       	Drop off the items or schedule a pickup
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordion">
      <div class="accordion-body">Place the item(s) in their original packaging with all accessories and drop off your item(s) or schedule a pick-up with one of our agent</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        Refund processed
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordion">
      <div class="accordion-body"> Once we receive your returned item, we will inspect it and process your refund within 10 business days via voucher or bank transfer depending on your selected option. See our timelines here.</div>
    </div>
  </div>
  
</div>
		</div>
	</div>
</div>
@endsection

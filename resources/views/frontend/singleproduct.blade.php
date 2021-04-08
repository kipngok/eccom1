@extends('layouts.frontend')
@section('content')
<!--Section: Block Content-->
<section class="mb-5">

  <div class="row">
   <div class="col-md-6 mb-4 mb-md-0">
   	<div id="mdb-lightbox-ui"></div>
   	<div class="mdb-lightbox">
   		<div class="row product-gallery mx-1">
		 <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
                <img src="">
              </a>
            </figure>
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-6">

      <p class="mb-2 text-muted text-uppercase small">Shirts</p>
  
      <p><span class="mr-1"><strong>$12.99</strong></span></p>
      <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
        error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
        officia quis dolore quos sapiente tempore alias.</p>
     
      <hr>
      <div class="table-responsive mb-2">
        <table class="table table-sm table-borderless">
          <tbody>
            <tr>
             <td>Quantity</td>
            </tr>
            <tr>
              <td>
         	<input class="form-control" min="0" name="quantity" value="1" type="number">      
              </td>
              <td>
              	<button type="button" class="btn btn-warning">Add to cart</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
     
    </div>


</section>
<!--Section: Block Content-->

@include('includes.footer')
@endsection

@extends('layouts.frontend')
@section('content')
<div class="container">
	<div class="row justify-content-center mt-5 mb-5 g-3">
		<div class="col-sm-5">
              <div class="card">
              <div class="card-body" style="text-align: center;">
              <i class="fa fa-check" style="font-size: 50px;"></i>
              <h3>Order placed Successfully!</h3>
              <p>A confirmation email has been sent to you </p>
              <a href="{{ url('/') }}" class="btn btn-warning">Home page</a>
            </div>
          </div>

            </div>
	</div>
</div>
@endsection
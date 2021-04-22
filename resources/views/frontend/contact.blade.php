@extends('layouts.frontend')
@section('content')
<div class="container">
	<div class="row mt-5 mb-5 justify-content-center">
		<div class="col-sm-4">
			<div class="card">
				<div class="card-body">
			<h6 style="font-weight: 800;">CONTACT US</h6>
			<p><i class="fa fa-building"></i> Trance Towers Tsavo Road, Nairobi<br>
			<i class="fa fa-phone"></i> (+254) 727 78 78 78<br>
			<i class="fa fa-phone"></i> (+254) 783 111 333<br>
			<i class="fa fa-envelope"></i> info@sukispares.com</p>
			<h6 style="font-weight: 800;">FOLLOW US ON SOCIAL MEDIA</h6>
			<div class="social-icons">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-instagram"></i></a>
			</div>
			</div>
		</div>
		<div class="card mt-2">
			<div class="card-body">
				<h6 style="font-weight: 800;">FIND US ON THE MAP</h6>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.777109494458!2d36.82855831363154!3d-1.309000636017833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11072e7f5649%3A0xb4719850e4040125!2sTrance%20Towers!5e0!3m2!1sen!2ske!4v1619014545569!5m2!1sen!2ske" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>
		</div>
		<div class="col-sm-6">
			<h3 style="font-weight: 800;">Contact us</h3>
			<form action="/contact" method="POST">
				@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Subject</label>
					<input type="text" name="subject" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea name="message" class="form-control" rows="10"></textarea>
				</div>
				<button type="submit" class="btn btn-sm btn-success mt-2">Send Email <i class="fa fa-chevron-right"></i> </button>
			</form>
		</div>
	</div>
</div>
@endsection

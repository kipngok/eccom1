@extends('layouts.app')
@section('content')


  <div class="page-header">
  <div class="row">
  <div class="col-sm-10"> <h4>Spare Requests</h4></div>
  </div>
  </div>

  <div class="container">
  <div class="row">
  <div class="col-sm-12">
    <div class="col-sm-6">
  <table class="table table-condensed table-striped table-bordered">
  <tbody>
  <tr><th>Name</th><td>{{$spareRequest->name}}</td></tr>
  <tr><th>Phone</th><td>{{$spareRequest->phone}}</td></tr>
  <tr><th>Email</th><td>{{$spareRequest->email}}</td></tr>
  <tr><th>Category</th><td>{{$spareRequest->category->name ?? ''}} >  {{$spareRequest->subCategory->name ?? ''}}</td></tr>
  <tr><th>Make & Model</th><td>{{$spareRequest->make->name ?? ''}} >  {{$spareRequest->model->name ?? ''}}</td></tr>
  <tr><th>Notes</th><td>{{$spareRequest->notes}}</td></tr>
  <tr><th>Status</th><td>{{$spareRequest->status}}</td></tr>
  @if($spareRequest->getMedia('spareRequests')->first())
  <tr><th>Image</th><td><img src="{{ $spareRequest->getMedia('spareRequests')->first()->getUrl() }}" alt="image" width="100%"; /></td></tr>
  @endif
  </tbody>
  </table>
  <div class="card mt-2 mb-5">
  	<div class="card-body">
  <h5 style="font-weight: 800;">Update status</h5>
  <form action="/spareRequest/{{$spareRequest->id}}" method="POST">
  @csrf
  <input type="hidden" name="_method" value="PUT">
  <div class="form-group">
  	<label>Status</label>
  	<select class="form-select" name="status">
  		<option>Pending</option>
  		<option>Completed</option>
  	</select>
  </div>
  <button type="submit" class="btn btn-sm btn-success">Update Status</button>
  	</form>
</div>
</div>
  </div>
 


  </div>
</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4><i class="fa fa-gift"></i> Coupons</h4></div>
</div>
 </div>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Coupon code</th>
        <th>Type</th>
        <th>Value</th>
         <th>Expiry date</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($coupons as $coupon) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$coupon->code}}</td>
        <td>{{$coupon->type}}</td>
        <td>{{$coupon->value}}</td>
        <td>{{$coupon->expiry_date}}</td>
        <td><a href="/coupon/{{$coupon->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$coupons->links()}}
	</div>
</div>
</div>

@endsection

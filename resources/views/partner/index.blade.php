@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Partners</h4></div>

     </div>
    </div>
<div class="container">
<div class="row">
  <div class="col-sm-12 over-flow">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>  
                <th>Logo</th>
                <th>Name</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner) 
                <tr>
                    <td>{{ ++$i }}</td>
                    @if($partner->getMedia('partners')->first())
                    <td><img height="50" src="{{$partner->getMedia('partners')->first()->getUrl()}}"></td>
                    @else
                    <td><img height="50" src="/img/not-found.png"></td>
                    @endif
                    <td>{{$partner->name}}</td>
                    <td>{{$partner->url}}</td>
                    <td><a href="/partner/{{$partner->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="over-flow  mt-5 mb-5"> 
    {{$partners->links()}}
    </div>
  </div>
</div>
</div>
@endsection

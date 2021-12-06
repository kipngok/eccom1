@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Banner</h4></div>

     </div>
    </div>
<div class="container">
<div class="row">
  <div class="col-sm-12 over-flow">
    <table class="table table-bordered">
        <thead>
            <tr> 
                <th>#</th>  
                <th>Image</th>
                <th>Title</th>
                <th>Url</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner) 
                <tr>
                    <td>{{ ++$i }}</td>
                    @if($banner->getMedia('banners')->first())
                    <td><img height="50" src="{{$banner->getMedia('banners')->first()->getUrl()}}"></td>
                    @else
                    <td><img height="50" src="/img/not-found.png"></td>
                    @endif
                    <td>{{$banner->title}}</td>
                    <td>{{$banner->url}}</td>
                    <td>{{$banner->location}}</td>
                    <td><a href="/banner/{{$banner->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="over-flow  mt-5 mb-5"> 
    {{$banners->links()}}
    </div>
  </div>
</div>
</div>
@endsection

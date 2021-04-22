@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Banner</h4></div>
     </div>
    </div>

<div class="container">
    <div class="row">
    <div class="col-sm-6">
    <table class="table table-condensed table-striped table-bordered">
        <tbody>
            <tr>
                <th>Title</th>
                <td>{{$banner->title}}</td>
            </tr>
            <tr>
                <th>Url</th>
                <td>{{$banner->url}}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{$banner->location}}</td>
            </tr>
            <tr>
                <th>Heading</th>
                <td>{{$banner->heading}}</td>
            </tr>
            <tr>
                <th>Sub Heading</th>
                <td>{{$banner->subHeading}}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{$banner->content}}</td>
            </tr>
        </tbody>
    </table>
    <form action="/banner/{{$banner->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="btn btn-group">
    <a href="/banner/{{$banner->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
    <a href="/banner" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    </form>
    </div>
    <div class="col-sm-6">
   <img src="{{ $banner->getMedia('banners')->first()->getUrl() }}" alt="image" width="100%"; />
    </div>
    </div>
    </div>
@endsection

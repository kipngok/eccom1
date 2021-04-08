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
    </tbody>
    </table>
    <form action="/banner/{{$banners->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="btn btn-group">
    <a href="/banner/{{$banners->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
    <a href="/banner" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    </form>
    </div>
    <div class="col-sm-6">
    <table>
    <tr>
    <td><img src="{{ asset('public/images/' . $banners->image) }}" alt="image" height="230px"; width="230px"; /></td>
    </tr>
    </table>
    </div>
    </div>
    </div>
@endsection

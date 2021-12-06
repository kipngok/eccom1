@extends('layouts.app')
@section('content')
<div class="page-header">
<div class="row">
<div class="col-sm-10"><h4>Rider</h4></div>
     </div>
    </div>

<div class="container">
    <div class="row">
    <div class="col-sm-6">
    @if(isset(Auth::user()->rider->id) && Auth::user()->rider->id == $rider->id)
    <div class="alert alert-success"> <i class="fa fa-check"></i> Your Rider Account is currently active</div>
    @endif
    <table class="table table-condensed table-striped table-bordered">
    <tbody>
    <tr>
    <th>Name</th>
    <td>{{$rider->user->name}}</td>
    </tr>
    <tr>
    <th>Regstration number</th>
    <td>{{$rider->reg_no}}</td>
    </tr>
    <tr>
    <th>Type</th>
    <td>{{$rider->type}}</td>
    </tr>
    <tr>
    <th>Status</th>
    <td>{{$rider->status}}</td>
    </tr>
    <tr>
    <th>City</th>
    <td>{{$rider->city}}</td>
    </tr>
    <tr>
    <th>Longitude</th>
    <td>{{$rider->longitude}}</td>
    </tr>
    <tr>
    <th>Latitude</th>
    <td>{{$rider->latitude}}</td>
    </tr>
    </tbody>
    </table>
    <form action="/rider/{{$rider->id}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <div class="btn btn-group">
    <a href="/rider/{{$rider->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
    <a href="/rider" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection


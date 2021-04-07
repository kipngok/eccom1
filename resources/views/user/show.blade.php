@extends('layouts.app')
@section('content')


  <div class="page-header">
  <div class="row">
  <div class="col-sm-10"> <h4>User</h4></div>
  </div>
  </div>

  <div class="container">
  <div class="row">
  <div class="col-sm-12">
    <div class="col-sm-6">
  <table class="table table-condensed table-striped table-bordered">
  <tbody>
  <tr>
  <th>Name</th>
  <td>{{$user->name}}</td>
  </tr>
  <tr>
  <th>Email</th>
  <td>{{$user->email}}</td>
  </tr>
  </tbody>
  </table>
  </div>
 
  <form action="/user/{{$user->id}}" method="POST">
  {{csrf_field()}}
  <input type="hidden" name="_method" value="DELETE">
  <div class="btn btn-group">
  <a href="/user/{{$user->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
   <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
  <a href="/user" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
  </div>
  	</form>

  @if(!empty($permissions))
    @foreach($permissions->chunk(4) as $chunk)
    <div class="row">
    @foreach($chunk as $permission)
    <div class="col-sm-3">
    <label class="label label-success">
        @if($user->hasPermissionTo($permission->name))
        <i class="fa fa-check"></i> 
        @else
        <i class="fa fa-times"></i> 
        @endif
        {{ $permission->name }}</label>
    </div>
    @endforeach
    </div>
    @endforeach
    @endif

  </div>
</div>
</div>
@endsection

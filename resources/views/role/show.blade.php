@extends('layouts.app')
@section('content')

<div class="page-header">
    <div class="row">
    <div class="col-sm-10"> <h4>Role</h4>
    </div>
  </div>
</div>

    <div class="container">
    <div class="row">
    <div class="card col-sm-4">
        <div class="card-body">
    <label>Role name</label>
    {{ $role->name }}

    <form action="/role/{{$role->id}}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <div class="btn btn-group">
      <a href="/role/{{$role->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
       <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
      <a href="/role" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
      </div>
    </form>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Permissions:</strong>
    @if(!empty($permissions))
    @foreach($permissions->chunk(4) as $chunk)
    <div class="row">
    @foreach($chunk as $permission)
    <div class="col-sm-3">
    <label class="label label-success">
        @if($role->hasPermissionTo($permission->name))
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
</div>
@endsection

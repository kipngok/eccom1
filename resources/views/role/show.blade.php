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
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <label>Role name</label>
    {{ $role->name }}
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
@endsection

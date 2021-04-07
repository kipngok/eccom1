@foreach($permissions->chunk(4) as $chunk)
<div class="row">
   @foreach($chunk as $permission)
	<div class="col-sm-3">
	<div class="custom-control custom-switch">
		@if($role->hasPermissionTo($permission->name))
		<input type="checkbox" class="custom-control-input" id="{{implode('-',explode(' ',$permission->name))}}" name="permissions[]" value="{{$permission->name}}" checked="checked">
		@else
		<input type="checkbox" class="custom-control-input" id="{{implode('-',explode(' ',$permission->name))}}" name="permissions[]" value="{{$permission->name}}">
		@endif
		<label class="custom-control-label" for="{{implode('-',explode(' ',$permission->name))}}">{{ ucfirst($permission->name) }}</label>
	</div>
	</div>
@endforeach
</div>
@endforeach
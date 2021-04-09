@extends('layouts.app')
@section('content')

<div class="page-header">
	 <div class="row">
    <div class="col-sm-10"><h4>Create user</h4></div>
  </div>
  </div>

<div class="container">
<div class="row">
	<div class="col-sm-10">
		<form action="/user" method="POST">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
				@error('name')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Roles</label>
				<select name="role_id" class="form-select @error('role_id') is-invalid @enderror" id="role_id" required="required">
					@foreach($roles as $role)
					<option value="{{$role->id}}">{{$role->name}}</option>
					@endforeach
				</select>
				@error('role_id')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
				@error('email')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
				@error('password')<span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span> @enderror
			</div>
			<div class="form-check form-check-inline">
  			<input class="form-check-input" type="checkbox" value="1" name="is_admin">
  			<label class="form-check-label">is admin</label>
			</div>
			<div id="permissions">
				
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
			</div>
		</form>

	</div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
 var rootPath='';
 $(document).on('change', '#role_id', function(){
    checkPermissions();
    });
 $(document).ready(function() {
    /* checkPermissions();*/
     });

 function checkPermissions(){
    var id= $('#role_id').val();
        $.ajax({
                url: rootPath + '/role/select/'+id,
                type: "GET", 
                success: function(data){
                    var data = $(data); 
                    $('#permissions').fadeOut().empty().html(data).fadeIn();    
                }
            });
    }
</script>
@endsection
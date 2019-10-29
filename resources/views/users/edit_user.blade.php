@extends('layouts.app')

@section('content')

<?php //sprint_r(json_decode($user->location_id));?>

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header-content header-elements-inline">
						<div class="page-title">
							<h5>
								<i class="icon-pencil mr-2"></i> <span class="font-weight-semibold">Users</span> - Edit User
							</h5>
						</div>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ url('/user/edit/'.$user->id) }}" id="adit_user_form">
				{{ csrf_field() }}


				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Activation</p>
						</span>
					</div>
					<div class="col-md-3">
						<div class="form-check form-check-switch form-check-switch-left">
							<label class="form-check-label d-flex align-items-center">
								<input type="checkbox" data-on-text="On" data-off-text="Off" class="form-check-input-switch" data-size="small" checked>
							</label>
						</div>
					</div>
				</div>
				<?php if ($user->user_role == 3) { ?>
					<div class="row">
						<div class="col-md-2 offset-md-3">
							<span class="input-group-text">
								<p>Two-way Authentication</p>
							</span>
						</div>
						<div class="col-md-3">
							<div class="form-check form-check-switch form-check-switch-left">
								<label class="form-check-label d-flex align-items-center">
									<input type="checkbox" name="authentication" data-on-text="On" data-off-text="Off" value="1" class="form-check-input-switch" data-size="small" @if($user->authentication == "true") checked @endif>
								</label>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>User Roles</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="custom-select1" id="set_location" name="user_role">
							@if(count($user_roles) > 0)
							@foreach($user_roles as $role)
							<option value="{{ $role->id }}" <?php if ($role->id == $user->user_role) {
									echo 'selected="selected"';
								} ?>>
								<span>{{ $role->description }}</span>
							</option>
							@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>First Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Last Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
					</div>
				</div>
				<?php if ($user->user_role == 3) { ?>
				<div class="row" id="manager_location">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Location</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="multiselect" name="location_id[]" multiple="multiple">
						<?php $locals = json_decode($user->location_id); ?>
						@if(count($locations) > 0)
						@foreach($locations as $location)
						<option value="{{ $location->id }}" <?php if(is_array($locals) && in_array($location->id , $locals)) {echo 'selected="selected"';} ?>><span>{{ $location->location_name }}</span></option>
						@endforeach
						@endif
						</select>
					</div>
				</div>
				<?php } ?>
				
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" value="{{ $user->email }}" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Password</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="password" name="password" value="" class="form-control">
						<code>If you don't want to change password, leave it Empty!</code>
					</div>
				</div>
				<div class="row" align="center">
					<div class="col-md-9 offset-md-1">
						<button type="submit" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Update</button>
						<button type="button" class="btn btn-danger legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>


<script type="text/javascript">
	$('.form-check-input-switch').bootstrapSwitch();
	$('.custom-select').select2({
		minimumResultsForSearch: Infinity
	});
	$('.custom-select1').select2({
		minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
		document.getElementById("adit_user_form").reset();
	}
	$('.multiselect').multiselect();
	
</script>

@endsection
@extends('layouts.app')

@section('content')
<?php // print_r($locations);exit; ?>
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
								<i class="icon-users mr-2"></i> <span class="font-weight-semibold">Users</span> - Add User
							</h5>
						</div>
					</div>
				</div>
			</div>
			<form method="post" action="{{ route('save_user') }}" id="add_user_form">
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
							<option value="{{ $role->id}}"><span>{{ $role->description }}</span></option>
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
						<input type="text" name="first_name" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Last Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="last_name" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Password</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="row" align="center">
					<div class="col-md-9 offset-md-1">
						<button type="submit" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
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
	$('.custom-select2').select2({
		minimumResultsForSearch: Infinity
	});
	$('.multiselect').multiselect();


	function resetForm() {
		document.getElementById("add_user_form").reset();
	}

</script>

@endsection
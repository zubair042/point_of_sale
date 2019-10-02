@extends('layouts.app')

@section('content')
<?php 
?>

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header-content header-elements-inline">
						<div class="page-title">
							<h5>
								<i class="icon-pencil mr-2"></i> <span class="font-weight-semibold">Location</span> - Edit Location
							</h5>
						</div>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ url('/location/edit/'.$location->id) }}" id="edit_location_form">
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Activation</p>
						</span>
					</div>
					<div class="col-md-3">
						<div class="form-check form-check-switch form-check-switch-left">
							<label class="form-check-label d-flex align-items-center">
								<input type="checkbox" data-on-text="On" data-off-text="Off" class="form-check-input-switch" data-size="small" name="" checked>
							</label>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Location Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="location_name" id="" value="{{ $location->location_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Customer</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="select_select2_select2" name="account_id" value="choose..">
							@if(count($customers) > 0)
							@foreach($customers as $customer)
							<option value="{{ $customer->id}}" <?php if ($customer->id == $location->account_id) {
									echo 'selected="selected"';
								} ?>><span>{{ $customer->account_name }}</span></option>
							@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>User Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="username" value="{{ $location->user_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" value="{{ $location->email }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Password</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="password" name="password" value="{{ $location->password }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Address</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address" value="{{ $location->address }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>City</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="city" value="{{ $location->city }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>State</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="state" value="{{ $location->state }}" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Zip</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="zip" value="{{ $location->zip }}" class="form-control">
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
	$('.select_select2_select2').select2({
		minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
		document.getElementById("edit_location_form").reset();
	}
</script>


@endsection
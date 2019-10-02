@extends('layouts.app')

@section('content')

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
								<i class="icon-location3 mr-2"></i> <span class="font-weight-semibold">Location</span> - Add Location
							</h5>
						</div>
					</div>
				</div>
			</div>
			<form method="POST" action="{{ route('save_location') }}" id="add_location_form">
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
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Location Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="location_name" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Customer</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="select_select2_select2" name="account_id" id="account_id">
							<option disabled selected hidden>Select Company</option>
							@if(count($customers) > 0)
							@foreach($customers as $customer)
							<option value="{{ $customer->id}}"><span>{{ $customer->account_name }}</span></option>
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
						<input type="text" name="username" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Password</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="password" name="password" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Address</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>City</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="city" id="" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>State</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="state" id="" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Zip</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="zip" id="" class="form-control">
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Manager</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="select_select2_select2" name="user_id" id="user_id">
							<option disabled selected hidden>Select Manger</option>
						</select>
					</div>
				</div> -->
				<div class="row text-center">
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
		document.getElementById("add_location_form").reset();
	}

	// function getUserById(){
	// 	var id = $('#account_id').val();
	// 	$.ajax({
	// 		type: "post",
	// 		url: "{{ route('show-manager') }}",
	// 		data: {id: id, "_token": "{{ csrf_token() }}"},
	// 		success:function(d){
	// 			$('#user_id').html('').select({data: []});
	// 			for (var i = 0; i <= d.length; i++) {
	// 				var id = d[i].id;
	// 				var name = d[i].first_name+' '+d[i].last_name;
	// 				var option = new Option(name,id,false,false);
	// 				$("#user_id").append(option).trigger('change');
	// 				//$("#manager-location").append($("<option/>").val(id).text(name));

	// 			}
	// 		}
	// 	})
	// }
</script>


@endsection
@extends('layouts.app')

@section('content')

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
								<i class="icon-magazine mr-2"></i> <span class="font-weight-semibold">Accounts</span> - Add Account
							</h5>
						</div>
					</div>
				</div>
			</div>
			<form method="post" action="{{ route('save_accounts')}}" id="add_accounts_form">
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
							<p>Account ID</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="account_id" class="form-control" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Account Type</p>
						</span>
					</div>
					<div class="col-md-3">

						<select class="select_select2" name="account_type">
							@foreach($account_type as $type)
							<!-- <option value="{{ $type->id }}"><span>{{ $type->description }}</span></option> -->
							@endforeach
							<option value="Customer">Customer</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Company Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="account_name" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Address</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text" ]>
							<p>Address 2</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address2" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>City</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="city" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>State</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="state" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Zip</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="zip" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Phone</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="phone" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Fax</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="fax" class="form-control">
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
							<p>Notes</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="note" class="form-control">
					</div>
				</div>
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
	$('.select_select2').select2({
		minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
		document.getElementById("add_accounts_form").reset();
	}
</script>

@endsection
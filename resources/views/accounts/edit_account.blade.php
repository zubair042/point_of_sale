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
								<i class="icon-pencil mr-2"></i> <span class="font-weight-semibold">Accounts</span> - Edit Account
							</h5>
						</div>

						<div class="header-elements">
							<h6>
								<span class="text-primary">Account ID: {{ $account->id }}</span>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<form method="post" action="{{ url('/account/edit/'.$account->id)}}" id="edit_account_form">
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
							<p>Account Type</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="select_select2" name="account_type">

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
						<input type="text" name="account_name" value="{{ $account->account_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Address</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address" value="{{ $account->account_address1 }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Address 2</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address2" value="{{ $account->account_address2 }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>City</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="city" value="{{ $account->account_city }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>State</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="state" value="{{ $account->account_state }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Zip</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="zip" value="{{ $account->account_zip }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Phone</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="phone" value="{{ $account->account_phone }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Fax</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="fax" value="{{ $account->account_fax }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" value="{{ $account->account_email }}" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Notes</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="note" value="{{ $account->account_notes }}" class="form-control">
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-9 offset-md-1">
						<button type="submit" class="btn btn-primary legitRipple btn1"><i class="icon-checkmark mr-2"></i>Update</button>
						<button type="button" class="btn btn-danger legitRipple btn2" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
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
		document.getElementById("edit_account_form").reset();
	}
</script>

@endsection
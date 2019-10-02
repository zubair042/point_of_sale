@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>

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
					<div class="col-md-2">
						<span class="input-group-text">
							<p>Item Name:</p>
						</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="account_id" class="form-control" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input-styled" name="stacked-radio-left" checked data-fouc>
								<span class="input-group-text">
									<p>Quantity</p>
								</span>
							</label>
						</div>
					</div>
					<div class="col-md-2">
						<input type="text" name="account_id" class="form-control" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input-styled" name="stacked-radio-left" checked data-fouc>
								<span class="input-group-text">
									<p>Foot</p>
								</span>
							</label>
						</div>
					</div>
					<div class="col-md-2">
						<input type="text" name="account_id" class="form-control" maxlength="8">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<span class="input-group-text">
							<p>Price:</p>
						</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="account_name" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<span class="input-group-text">
							<p>Discount:</p>
						</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="address" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<span class="input-group-text" ]>
							<p>Pending Item:</p>
						</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="address2" class="form-control">
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
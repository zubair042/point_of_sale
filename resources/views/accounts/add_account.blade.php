@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="page-header-content header-elements-inline">
				<div class="page-title">
					<h3>Sale Form</h3>
				</div>
			</div>
			<hr style="border: 1px solid grey;">
			<div class="card-body">
				<form method="post" action="{{ route('save_accounts')}}" id="add_accounts_form">
					{{ csrf_field() }}
					<div class="row form-group">
						<div class="col-md-3">
							<span class="input-group-text">
								<label class="d-block font-weight-semibold">Item Name:</label>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="account_id" class="form-control" maxlength="8">
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							<div class="form-group mb-3 mb-md-2">
								<div class="form-check form-check-inline">
									<label class="form-check-label"><input type="radio" class="form-check-input-styled" name="radio-inline-left" data-fouc="" id="quantity">
										Quantity
									</label>
								</div>

								<div class="form-check form-check-inline">
									<label class="form-check-label"><input type="radio" id="foot" class="form-check-input-styled" name="radio-inline-left" data-fouc="">
										Foot
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row quantity_text" style="display: none">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Add Quantity:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="number" name="" class="form-control">
						</div>
					</div>
					<div class="row foot_text" style="display: none;"> 
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Add Foot:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="number" name="" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Price:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="account_name" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Discount:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="address" class="form-control">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Pending Item:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="address2" class="form-control">
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							<button type="submit" class="btn btn-success legitRipple"><i class="icon-checkmark mr-2"></i>Total</button>
							<button type="button" class="btn btn-danger legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
							<button type="button" class="btn btn-primary legitRipple"><i class="icon-arrow-up-right32 mr-2"></i>Add Item</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="page-header-content header-elements-inline">
				<div class="page-title">
					<h3>Items List</h3>
				</div>
			</div>
			<hr style="border: 1px solid grey;">
			<div class="card-body">
				<div class="row">
					
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.form-check-input-switch').bootstrapSwitch();
	$('.select_select2').select2({
		minimumResultsForSearch: Infinity
	});
	// $('#quantity').on('change',function(){
	// 	if ($(this).prop('checked', true)) {
	// 		$('#quantity_input').removeAttr('readonly');
	// 		$('#foot_input').attr('readonly');
	// 	}else {
	// 		$('#quantity_input').attr('readonly');
	// 	}
		
	// });
	$('#quantity, #foot').change(function () {
   if (this.id == 'quantity') {
      $('.quantity_text').show();
      $('.foot_text').hide();
   }
   else if (this.id == 'foot') {
      $('.foot_text').show();
      $('.quantity_text').hide();
   }else{

   }
});
	function resetForm() {
		//alert();
		document.getElementById("add_accounts_form").reset();
	}
</script>

@endsection
@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<link href="{{asset('global_assets/css/icons/material/icons.css')}}" rel="stylesheet" type="text/css">

<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="page-header-content header-elements-inline">
				<div class="page-title">
					<h3>Inventory System</h3>
				</div>
			</div>
			<hr style="border: 1px solid grey;">
			<div class="card-body">
				<form id="add_accounts_form">
					<input type="hidden" name="counter" value="1">
					<div class="row form-group">
						<div class="col-md-3">
							<span class="input-group-text">
								<label class="d-block font-weight-semibold">Item Name:</label>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" id="item_name" class="form-control">
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
							<input type="number" name="quantity" id="quantity_input" class="form-control">
						</div>
					</div>
					<div class="row foot_text" style="display: none;"> 
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Add Foot:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="number" name="foot" id="foot_input" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Price:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="number" name="price" id="price" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Product Code:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="number" name="product_code" id="price" class="form-control">
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Discount:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="discount" class="form-control">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">
							<span class="input-group-text">
								<p>Pending Item:</p>
							</span>
						</div>
						<div class="col-md-9">
							<input type="text" name="pending" class="form-control">
						</div>
					</div> -->
					<div class="row text-center" style="margin: 20px 0">
						<div class="col-md-12">
							<!-- <button type="submit" class="btn btn-success legitRipple"><i class="icon-checkmark mr-2"></i>Total</button> -->
							<button type="button" onclick="add_item();" class="btn btn-primary legitRipple"><i class="icon-arrow-up-right32 mr-2"></i>Add Item</button>
							<button type="button" class="btn btn-danger legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
						</div> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="card">
			<div class="page-header-content header-elements-inline">
				<div class="page-title">
					<h3>Items List</h3>
				</div>
			</div>
			<hr style="border: 1px solid grey;">
			<div class="card-body">
				<div class=" card-table table-responsive shadow-0 mb-0">
					<form method="post" id="sale_form">
						{{ csrf_field() }}
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Item Name</th>
									<th>Quantity</th>
									<th>Foot</th>
									<th>Price</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="list_item_div">
									
							</tbody>
						</table>
						<div class="row" style="margin-top: 25px;">
						<div class="col-md-2 offset-md-1">
							<span class="input-group-text">
								<p>Discount:</p>
							</span>
						</div>
						<div class="col-md-8">
							<input type="number" name="discount" class="form-control">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-2 offset-md-1">
							<span class="input-group-text">
								<p>Pending Item:</p>
							</span>
						</div>
						<div class="col-md-8">
							<input type="number" name="pending_item" class="form-control">
						</div>
					</div>
					<div class="row" style="margin: 20px 0">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-success legitRipple text"><i class="icon-checkmark mr-2"></i>Total</button>
						</div>
					</div>
					</form>
				</div>
			</div>
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

	$('#quantity, #foot').change(function () {
	   if (this.id == 'quantity') {
	      $('.quantity_text').show();
	      $('.foot_text').hide();
	   }
	   else if (this.id == 'foot') {
	      $('.foot_text').show();
	      $('.quantity_text').hide();
	   }
	});

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
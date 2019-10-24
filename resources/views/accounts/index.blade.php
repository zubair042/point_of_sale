@extends('layouts.app')
@section('content')
<?php //echo "<pre>";print_r($account_detail);exit; ?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="media bg-secondary">
						<div class="page-header-content">
							<p><h2 class="text-white" >Results for "Registered Accounts"</h2></p>
						</div>
					</div>
				</div>
			</div>
			<div class="datatable-scroll">
				<table class="table" id="main-datatable-users">
				    <thead>
				      <th>ID</th>
				      <th>Item Name</th>
				      <th>Quantity/Food</th>
				      <th>Pending Item</th>
				      <th>Discount</th>
				      <th>Total Price</th>
				      <th></th>
				    </thead>
				    <tbody>
				    	@if(count($account_detail) > 0)
				    		@foreach($account_detail as $detail)
				    		<tr>
				        	<td><span>{{ $detail->id }}</span></td>
				        	<td><span>{{ $detail->item_name}}</span></td>
				        	<td><span>
				        		Total Quantity:
				        		<?php $quantity = json_decode($detail->quantity);
				        		echo array_sum($quantity); 
				        		?>	
				        		Total Foot:	
				        		<?php $foot = json_decode($detail->foot);
				        		echo array_sum($foot); 
				        		?>
				        	</span></td>
				        	<td><span>{{ $detail->pending_item }}</span></td>
				        	<td>Rs: {{ number_format($detail->discount) }}</td>	
				        	<td>Rs: {{ number_format($detail->total_price) }}</td>	
							<td class="text-right"><!-- <a href="{{url('account/edit/'.$detail->id) }}">
							<i class="icon-pencil mr-3 icon-1x text-success"></i></a> -->
							<a onclick="del_account(<?php echo $detail->id; ?>)" href="javascript:;">
							<i class="icon-bin mr-3 icon-1x text-danger"></i></a></td>

			      		</tr>	
				    		@endforeach
				    	@endif
			      		
				    </tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>


<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">

	$("#main-datatable-users").DataTable({
	autoWidth: false,
	columnDefs: [{ 
		orderable: false,
		//width: 100,
		targets: [ 5 ]
	}],
	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
	language: {
		search: '<span>Filter:</span> _INPUT_',
		searchPlaceholder: 'Type to filter...',
		lengthMenu: '<span>Show:</span> _MENU_',
		paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
	}
});

function del_account(id){ 
	if (confirm('Are you sure you want to delete')) {
		$.ajax({
			type: "post",
			url: "{{ route('destroy-account') }}",
			data: {'id': id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				alert('Account deleted successfully!');
				location.reload();
			}
		})
	}else{
		alert('Delete Cancel');
	}
}

</script>



@endsection
@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="media bg-primary">
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
				    	<tr>
				        	<td><span></span></td>
				        	<td><span></span></td>
				        	<td><span>
				        		
				        	</span></td>
				        	<td><span></span></td>
				        	<td>Rs: </td>	
				        	<td>Rs: </td>	
							<td class="text-right"><!-- <a href="">
							<i class="icon-pencil mr-3 icon-1x text-success"></i></a> -->
							<a onclick="" href="javascript:;">
							<i class="icon-bin mr-3 icon-1x text-danger"></i></a></td>
			      		</tr>	
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

// function del_account(id){ 
// 	if (confirm('Are you sure you want to delete')) {
// 		$.ajax({
// 			type: "post",
// 			url: "{{ route('destroy-account') }}",
// 			data: {'id': id, "_token": "{{ csrf_token() }}"},
// 			success:function(data){
// 				alert('Account deleted successfully!');
// 				location.reload();
// 			}
// 		})
// 	}else{
// 		alert('Delete Cancel');
// 	}
// }

</script>

@endsection
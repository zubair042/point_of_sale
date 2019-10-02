@extends('layouts.app')
@section('content')
<?php //echo "<pre>";print_r($location_detail);exit; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="row">
					<div class="col-md-12">
						<div class="media bg-primary">
							<div class="page-header-content">
								<p><h2 class="text-white">Results for "Latest Registered Locations"</h2></p>
							</div>
						</div>
					</div>
				</div>
				<div class="datatable-scroll">
					<table class="table" id="main-datatable-users">
					    <thead>
					      <th>ID</th>
					      <th>Location Name</th>
					      <th>Company Name</th>
					      <th>Manager</th>
					      <th></th>
					    </thead>
					    <tbody>
					    	@if(count($location_detail) > 0)
				    			@foreach($location_detail as $detail)
							    	<tr>
							        	<td><span>{{ $detail->id }}</span></td>
							        	<td><span>{{ $detail->location_name }}</span></td>
							        	<td><span>{{ $detail->account_name }}</span></td>
							        	<td><span>
							        		@foreach($detail->users as $manager)
							        			{{ $manager->first_name." ".$manager->last_name }} ,
							        		@endforeach

							        	</span></td>
							        	<td align="right"><a href="{{ url('/location/edit/'.$detail->id) }}"><i class="icon-pencil mr-3 icon-1x text-success"></i></a><a onclick="del_location(<?php echo $detail->id.",".$detail->user_id; ?>)" href="javascript:;"><i class="icon-bin mr-3 icon-1x text-danger"></i></a></td>
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
		targets: [ 3 ]
	}],
	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
	language: {
		search: '<span>Filter:</span> _INPUT_',
		searchPlaceholder: 'Type to filter...',
		lengthMenu: '<span>Show:</span> _MENU_',
		paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
	}
});


function del_location(id,user_id){
	if (confirm('Are you sure you want to delete')) {
		$.ajax({
			type: "post",
			url: "{{ route('destroy-location') }}",
			data: {"id": id, "user_id":user_id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				// console.log(data);
				alert('Location deleted successfully!');
				location.reload();
			}
		})
	}
}
</script>



@endsection
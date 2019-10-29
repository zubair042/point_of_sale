@extends('layouts.app')

@section('content')
<?php //echo "<pre>";print_r($user_detail);exit; ?>
<?php
$user_role = DB::table('user_roles')
    ->where('id', Auth::user()->user_role)
	->first();
	//dd($user_role);
?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="row">
					<div class="col-md-12">
						<div class="media bg-secondary">
							<div class="page-header-content">
								<p><h2 class="text-white">WHEEL / TIRE USERS REPORT</h2></p>
							</div>
						</div>
					</div>
				</div>
				<div class="datatable-scroll">
					<table class="table" id="main-datatable-users">
					    <thead>
					      <th>ID</th>
					      <th>Email</th>
					      <th>Full Name</th>
					      <th>User Role</th>
					      <th>Date</th>
					      <th></th>
					    </thead>
					    <tbody>
					    	@if (count($user_detail) > 0)
				    		@foreach($user_detail as $detail)
					    	<tr>
					        	<td><span>{{$detail->id}}</span></td>
					        	<td><span>{{$detail->email}}</span></td>
					        	<td><span><?php echo $detail->first_name." ".$detail->last_name;?></span></td>
					        	<td>{{ $detail->description }}</td>
								<td>{{date("Y-M-d", strtotime($detail->created_at))}}</td>
								@if ($user_role->id == 1)
								<td class="text-right"><a href="{{ url('/user/edit/'.$detail->id) }}"><i class="icon-pencil mr-3 icon-1x text-success"></i></a><a onclick="del_user(<?php echo $detail->id ?>)" href="javascript:;"><i class="icon-bin mr-3 icon-1x text-danger" onclick="checkDelete();"></i></a></td>
								@else 
									@if ($detail->user_role != 1)
									<td class="text-right"><a href="{{ url('/user/edit/'.$detail->id) }}"><i class="icon-pencil mr-3 icon-1x text-success"></i></a><a onclick="del_user(<?php echo $detail->id ?>)" href="javascript:;"><i class="icon-bin mr-3 icon-1x text-danger" onclick="checkDelete();"></i></a></td>
									@endif
								@endif
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

function del_user(id){ 
	if (confirm('Are you sure you want to delete')) {
		$.ajax({
			type: "post",
			url: "{{ route('destroy-user') }}",
			data: {'id': id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				alert('User deleted successfully!');
				location.reload();
			}
		})
	}else{
		alert('Delete Cancel');
	}
}

</script>



@endsection
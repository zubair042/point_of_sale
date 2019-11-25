@extends('layouts.app')
@section('content')

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
			    		<tr>
				        	<td><span></span></td>
				        	<td><span></span></td>
				        	<td><span>
				        		
				        	</span></td>
				        	<td><span></span></td>
				        	<td></td>	
				        	<td></td>	
							<td class="text-right">
							<a >
							<i class="icon-bin mr-3 icon-1x text-danger"></i></a></td>
		      			</tr>
				    </tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>

@endsection
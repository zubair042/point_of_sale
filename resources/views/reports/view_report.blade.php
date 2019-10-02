@extends('layouts.app')
@section('content')
<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10">
						<?php if ($user->user_role == 3) { ?>
							<a href="{{ url('reports') }}"><button type="button" class="btn btn-outline-success legitRipple"><i class="icon-arrow-left8 mr-2"></i>Back</button></a>
							&nbsp;&nbsp;
						<?php } ?>
						<h1 class="mb-0 font-weight-semibold ml-2">Wheel/Tire Installation Report</h1>
					</div>
					<div class="col-md-2">
						<span class="font-weight-semibold float-right text-primary font-size-lg m-2">ID: {{ $report_detail->id }}</span>
						<input type="hidden" value={{ $report_detail->id }} id="reportId">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<div class="text-center">
						<!-- <a href="javascript:;" class="d-inline-block"> -->
						<?php if ($reportType['main_image'] == '' && $user->user_role == 3) { ?>
							<a href="javascript:;">
								<input type="image" src="{{asset('')}}global_assets/images/image_uploader.png" id="uploadImage" class="img-fluid chooseFile static_image" alt="">
								<img src="{{asset('')}}global_assets/images/spinner_small.gif"id="image_spin" style="display:none;width: 20%;margin:18% 40%">
								<input type="file" name="uploadImage" id="imageToUpload" class="d-none">
							</a>
						<?php }elseif ($reportType['main_image'] == '' && $user->user_role != 3) { ?>
							<img src="{{asset('')}}global_assets/images/image_uploader.png" class="img-fluid" alt="">
						<?php } else { ?>								
							<img src="<?php echo $reportType['main_image'] ?>" class="img-fluid" style="max-height: 400px">
						<?php } ?>
						<!-- </a> -->
					</div>
						<div class="card mt-10">
							<div class="card-header">
								<div class="row">
									<div class="col-md-9">
										<h6 class="card-title text-secondary">Comments:</h6>
										@if(count($comments) > 0)
										@foreach($comments as $comment)
										<span class="text-primary font-weight-semibold">{{ $comment->first_name." ".$comment->last_name}} : </span><span>{{ $comment->comments }}</span><br>
										@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label class="font-weight-black">Work Performed By:</label>
						<p>{{ $report_detail->name }}</p>
						<label class="font-weight-black">Unit Number:</label>
						<p>{{ $report_detail->report_unit_num }}</p>
						<label class="font-weight-black">Location:</label>
						<p> {{ $report_detail->location_name }} </p>
						<label class="font-weight-black">Wheel Lug Nuts Torqued To:</label>
						<p>{{ $report_detail->weight }} Lbs</p>
						<label class="font-weight-black">Second Signature:</label>
						<p>{{ $report_detail->first_name." ".$report_detail->last_name }}</p>
						<label class="font-weight-black">Signature Date:</label>
						<p>	@if($report_detail->signature_on != "")
								{{ date('m/d/Y H:i A',strtotime($report_detail->signature_on)) }}
							@endif
						</p>
						<label class="font-weight-black">Tech Comment:</label>
						<p class="form-group">{{$report_detail->comment}}</p>

						<?php if ($user->user_role == 2 || $user->user_role == 3) { ?>

							<?php if ($user->user_role == 3) { ?>
								<?php if ($report_detail->signature != 1) { ?>
									<p class=" mt-10">I have visually inspected this technician's work and it appears to have been completed to proper industry standards.</p>

									<button type="button" id="signature_btn" class="btn btn-primary rounded-round legitRipple" <?php if ($user->user_role == 3) { ?> onclick="add_signature(<?php echo $report_detail->id; ?>)" <?php } ?>>
										Apply Signature</button>
								<?php } ?>
							<?php } ?>
							<button type="button" class="btn btn-danger rounded-round legitRipple" <?php if ($user->user_role == 2 || $user->user_role == 3) { ?> data-toggle="modal" data-target="#modal_comment" <?php } ?>>
								Add Comment</button>

						<?php } ?>
					</div>
				</div>
				<div class="card mt-10 bg-success-300">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-center">
								<h1 class="font-weight-semibold text-white"><?php echo $reportType['imageHeading']; ?></h1>
							</div>
						</div>
						<div class="row">
							<?php foreach($reportType['images'] as $key=>$val): ?>
							<?php if(count($val)>0): ?>
							<div class="col-md-6">
								<h5 class="font-weight-semibold text-white text-center"><?php echo $key; ?></h5>
								<div class="row">
								<?php foreach($val as $key1=>$val1): ?>
										<!-- <?php $extension = pathinfo($val1->url)['extension'];
										
										if ($extension == 'mp4' || $extension == 'avi' || $extension == 'flv' || $extension == 'mkv') { ?>
										<div class="col-md-5 card-img-actions m-1">
										<video style="width:160%;" controls><source src="{{$val1->url}}" ></video>
									</div>	
										<?php }elseif ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'webp') { ?>
										<div class="col-md-5 card-img-actions m-1">
												<img class="card-img img-fluid h-200" src="{{$val1->url}}" alt="" width="100">
												<div class="card-img-actions-overlay card-img">
													<a href="{{$val1->url}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
														<i class="icon-eye2"></i>
													</a>
												</div>
											</div>

										<?php } ?> -->
									<?php $extension = pathinfo($val1->url)['extension'];
										if ($extension == 'mp4' || $extension == 'avi' || $extension == 'flv' || $extension == 'mkv') { ?>
										<div class="col-md-5 card-img-actions m-1">
											<a class="fancybox fancybox.iframe" href="{{$val1->url}}">
												<video style="width: 100% !important"><source src="{{$val1->url}}" ></video>
												<i class="icon-play4 icon-play"></i>
											</a>
										</div>	
										<?php }elseif ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'webp') { ?>
											<div class="col-md-5 card-img-actions m-1">
												<a rel="gallery" class="fancybox" href="{{$val1->url}}"><img class="card-img img-fluid" style="width: 90%;height: 85%" src="{{$val1->url}}" alt=""/></a>
											</div>
										<?php } ?>
								<?php endforeach; ?>
								</div>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="modal_comment" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<form method="post" action="{{ route('add_comment') }}">
			<input type="hidden" name="report_id" value="{{ $report_detail->id}}">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-body">
					<h6 class="font-weight-semibold">Add a comment</h6>
					<div class="form-group row">
						<div class="col-lg-12">
							<textarea rows="3" cols="3" name="comments" class="form-control" placeholder="Write your comments.."></textarea>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn bg-primary">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>

<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">
<!--
		padding: 3,
		'width':1080,
		'height':1921,
		'autoSize' : false,
		'type'   : 'iframe',
		'scrolling'     : 'no',
		/*
		iframe : {
			img : {
				margin: 'auto',
				display: 'block',
				height : '1000px',
			},
			preload : false
		},		*/
        
        /////////////////////////////////
        
    afterLoad  : function () {
        $.extend(this, {
            aspectRatio : false,
            type    : 'html',
            width   : '90%',
            height  : '90%',
            content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
        });
    }        

-->
<script type="text/javascript">
	$(".fancybox")
	    .attr('rel', 'gallery')
	    .fancybox({
	        openEffect  : 'none',
	        closeEffect : 'fade',
	        nextEffect  : 'none',
	        prevEffect  : 'none',
	        autoSize 	: 'true',
	        padding     : 0,
	        scrollOutside: 'false',
	        margin      : [20, 60, 20, 60] // Increase left/right margin
	    });

	$('[data-popup="lightbox1"]').fancybox({
		padding: 3
	});
	// $('.form-control-uniform-custom').uniform({
	//            fileButtonClass: 'action btn bg-blue',
	//            selectClass: 'uniform-select bg-pink-400 border-pink-400'
	//        });
	function add_signature(id) {
		if (confirm('Are you sure you want to Add Signature')) {
			$.ajax({
				type: "post",
				url: "{{ route('signature') }}",
				data: {
					'id': id,
					"_token": "{{ csrf_token() }}"
				},
				success: function(data) {
					alert('Signature added successfully!');
					$('#signature_btn').hide();
					location.reload();
				}
			})
		}
	}
	$('.chooseFile').on('click', function(e) {
		var name = $(this).attr('id');
		$('input[name=' + name + ']').click();
	});
	$('#file').on('click', function(e) {
		e.preventDefault();
		var property = $('#file').prop('files')[0];
		var image_name = property.name;
		var image_extention = image_name.split('.').pop().toLowerCase();
		if (jQuery.inArray(image_extention, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
			alert("Invalid image file");
		} else {
			form_data = new FormData();
			form_data.append('file', property);
			console.log(form_data);
		}

	});

	$('#imageToUpload').on('change', function(e) {

		//e.preventDefault();
		var name = $(this).attr('name');
		var reportId = $("#reportId").val();
		var formD = new FormData();
		formD.append('file', $(this)[0].files[0]);
		formD.append("name", name);
		formD.append("report_id", reportId);
		formD.append("image_type", "main_image");
		$('.static_image').hide();
		$('#image_spin').show();
		$.ajax({
			url: "{{ route('add_image') }}",
			type: "post",
			data: formD,
			contentType: false,
			cache: false,
			headers: {
				'X-CSRF-TOKEN': $('#csrf-token').val()
			},
			processData: false,
			success: function(data) {
				$('#upload_image').html(data.image);
				$('#image_spin').hide();
				location.reload();
				// console.log(data);
				// $("#uploadedImage").html(data);
			}
		})
	});

	function delete_report(id) {
		if (confirm('Are you sure you want to Delete Report')) {
			$.ajax({
				type: "post",
				url: "{{ route('delete_report') }}",
				data: {
					'id': id,
					"_token": "{{ csrf_token() }}"
				},
				success: function(data) {
					alert('Report Deleted successfully!');
					window.location.replace('{{ url("/reports")}}');
				}
			})
		} else {
			alert('Report Canceled');
		}
	}
</script>

@endsection
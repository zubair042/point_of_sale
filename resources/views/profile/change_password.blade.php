@extends('layouts.app')

@section('content') 
<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script> 
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<?php 
?>
<style type="text/css">
    h1 {
        padding: 0;
        margin: 0 8px;
        font-size: 24px;
        color: #2679b5;
    }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card" style="padding: 12px;">
      <div class="row">
        <div class="col-md-6">
          <h1 class="pull-left">Two-way authentication <img src="{{asset('global_assets/images/ajax_clock_small.gif')}}" alt="" id="authentication_loader" style="display:none;"></h1>
        </div>
        <div class="col-md-6">
          <div class="form-check form-check-switch form-check-switch-left float-right">
            <label class="form-check-label d-flex align-items-center">
              <input type="checkbox" data-on-text="On" data-off-text="Off" class="form-check-input-switch" data-size="small" @if($user->authentication=="true") checked @endif onchange="authentication(this)">
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="card" style="padding: 12px;">
      <div class="row">
        <div class="col-md-12">
          <h1>Change Password </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <hr allign="left">
        </div>
      </div>
      <form method="POST" action="{{url('/profile/settings/'.$user->id)}}" id="reset_password">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-md-2 offset-md-3"> <span class="input-group-text">
            <p>Enter you new password</p>
            </span> </div>
          <div class="col-md-3">
            <input type="password" name="password" id="password" value="" class="form-control" onchange='check_pass();'>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 offset-md-3"> <span class="input-group-text">
            <p>Confirm your new password</p>
            </span> </div>
          <div class="col-md-3">
            <input type="password" name="change_password" id="change_password" value="" class="form-control" onchange='check_pass();'>
          </div>
        </div>
        <div class="row" style="text-align: center;margin:30px 0;">
          <div class="col-md-9 offset-md-1">
            <button type="submit" name="submit" id="submit" disabled style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Change Password</button>
            <button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
	$('.form-check-input-switch').bootstrapSwitch();
    function check_pass() {
        if (document.getElementById('password').value ==
            document.getElementById('change_password').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }

    function resetForm() {
		//alert();
    	document.getElementById("reset_password").reset();
	}
	
	function authentication(e){
		var authentication = $(e).is(":checked");
		
		/*$.ajax({
		   type:'POST',
		   url:'/ajax',
		   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		   success:function(data){
			  $("#msg").html(data.msg);
		   }
		});	*/	
		
		$("#authentication_loader").show();
		$.post("<?php echo url('/profile/authentication/'.$user->id); ?>", {"authentication": authentication, "_token": "{{ csrf_token() }}"}).done(function(e){
			$("#authentication_loader").hide();
		});
	}
</script> 
@endsection
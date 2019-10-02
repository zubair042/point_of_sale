<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Wheel Tire | Login</title>

<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script src="{{ asset('') }}global_assets/js/main/jquery.min.js"></script>
<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('') }}global_assets/js/plugins/loaders/blockui.min.js"></script>
<script src="{{ asset('') }}global_assets/js/plugins/ui/ripple.min.js"></script>

<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- /theme JS files -->

</head>
<style type="text/css">
body {
	background-image: url("{{ asset('global_assets/images/background.png') }}");
	background-repeat: no-repeat;
	background-size: 100% 100%;
  height: 100%

}
.border-slate-300 {
	border-color: #F37333 !important;
}
</style>
<body>

<!-- Page content -->
<div class="page-content"> 
  
  <!-- Main content --> 
  <div class="content-wrapper"> 
      <div class="content d-flex align-items-center justify-content-center">
        <!-- <div class="col-md-4">
        </div> -->
        
        <div class="col-md-4">
          <form id="add_new_user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
              <div class="card-header header-elements-inline" style="background: #708bea;height: 90px;">
              </div>

              <div class="card-body" style="margin-top: 35px;">
                <div class="text-center" style="font-size: 25px;margin-bottom: 25px;">
                  <span class="font-weight-semibold" style="color: #797373;">Sign Up</span>
                </div>
                <div id="alert_msg" style="display: none;">
                  <div class="alert alert-danger border-0 alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                  <span class="font-weight-semibold">Warning!</span> Email already exists.</div>
                </div>
                <div class="form-group">
                  <label for="name">Company ID</label>
                  <input type="text" class="form-control" name="company_id" placeholder="Enter your company ID">
                  @if ($errors->has('company_id'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('company_id') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter your name">
                  @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="name">Email Address</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter your email">
                  @if ($errors->has('email'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter password ">
                  @if ($errors->has('password'))
                  <span class="help-block">
                      <strong style="color: red;">{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="text-center" style="margin-top: 40px;">
                  <a href="{{ url('login') }}" style="float: left; color:#6178ca;" class="btn btn-light legitRipple"><i class="icon-arrow-left13" style="color: #6178ca;"></i> Login</a>
                  <input type="submit" style="background: #6178ca;margin-bottom: 10px;" class="btn btn-primary" value="Sign Up">
                </div> 
              </div>
            </div>
          </form>
        </div>

      </div>   
  </div> 
</div>

</body>
</html>
<script src="{{ asset('') }}global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
  <script src="{{ asset('') }}global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>



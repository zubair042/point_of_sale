@extends('layouts.app')

@section('content')
<?php 
?>
<style type="text/css">
  .form-group{
    margin-bottom: .85rem;
  }
  .table td{
    border-top: none;
    padding: .5rem 1.25rem; 
  }
</style>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/buttons/spin.min.js') }} "></script>
<script src="{{ asset('global_assets/js/plugins/buttons/ladda.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/components_buttons.js') }}"></script>
<textarea style="display: none" id="reportTypes"><?php echo json_encode($data); ?></textarea>
<script type="text/javascript">
  $vehicleType = JSON.parse($("#reportTypes").html());
</script>
<div class="row">
  <div class="col-md-12">
    <div class="card card-body">
      <form id="trailer_powerunit" name="report_registration" method="POST" action="{{ route('save_reports') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group mb-3 mb-md-2 text-center">
          <div class="form-check form-check-inline form-check-right">
            <label class="form-check-label">
              <span class="font-weight-semibold">TRAILER</span>
              <div class=""><span class="">
                  <input type="radio" id="trailer_radio" class="form-check-input-styled-danger" name="vehicle_type" value="trailer" checked="" data-fouc="">
                </span></div>
            </label>
          </div>
          <div class="form-check form-check-inline form-check-right">
            <label class="form-check-label">
              <span class="font-weight-semibold">POWER UNIT</span>
              <div class=""><span class="">
                  <input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" name="vehicle_type" value="power_unit" data-fouc="">
                </span></div>
            </label>
          </div>
        </div>
        <div class="row" id="power_unit_html" style="display:none; margin-top: 10px;padding: 12px;">
          <div class="row">
            <div class="col-md-12" style="background-color: #fafafa;">
              <div class="col-md-8 offset-md-2">
                <div class="text-center">
                  <h5>SELECT WHEEL YOU WORKED ON</h5>
                </div>
                <li class="media">
                  <div class="mr-3 align-self-center img-width text-right">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label"> <span class="font-size-lg">Left Steer Wheel</span>
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_left_stear" value="1" data-fouc="">
                      </label>
                    </div>
                  </div>
                  <div class="media-body text-center"> <a href="javascript:;">
                      <input type="image" name="power_unit_left_stear" style="width: 13%; margin-right: unset; margin-left: 16%;" class="chooseImage" src="{{asset('global_assets/images/tire1.jpg')}}">
                      <input type="file" name="power_unit_left_stear[]" id="power_unit_left_stear" class="d-none" multiple>
                    </a>
                    <input type="image" name="" class="align-self-center custom-style" src="{{asset('global_assets/images/line1.png')}}">
                    <a href="javascript:;">
                      <input type="image" name="power_unit_right_stear" style="width: 13%; margin-left: unset;  margin-right: 15%;" class="chooseImage float-right" src="{{asset('global_assets/images/tire1.jpg')}}">
                      <input type="file" name="power_unit_right_stear[]" id="power_unit_right_stear" class="d-none" multiple>
                    </a> </div>
                  <div class="align-self-center ml-3 img-width">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_stear" value="1" data-fouc="">
                        &nbsp;&nbsp; <span class="font-size-lg">Right Steer Wheel</span> </label>
                    </div>
                  </div>
                </li>
                <li class="media">
                  <div class="mr-3 align-self-center img-width text-right">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label"> <span class="font-size-lg">Left Front Wheel</span>
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_left_front" value="1" data-fouc="">
                      </label>
                    </div>
                  </div>
                  <div class="media-body text-center">
                    <a href="javascript:;">
                      <input type="image" name="power_unit_left_front" style="width: 25%; margin-right: unset;" class="chooseImage" src="{{asset('global_assets/images/tire_img.jpg')}}">
                      <input type="file" name="power_unit_left_front[]" id="power_unit_left_front" class="d-none" multiple>
                    </a>
                    <input type="image" name="" class="custom-style-1 align-self-center" src="{{asset('global_assets/images/line1.png')}}">
                    <a href="javascript:;">
                      <input type="image" name="power_unit_right_front" class="chooseImage" style="width: 25%; margin-left: unset;" src="{{asset('global_assets/images/tire_img.jpg')}}">
                      <input type="file" name="power_unit_right_front[]" id="power_unit_right_front" class="d-none" multiple>
                    </a> </div>
                  <div class="align-self-center ml-3 img-width">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_front" value="1" data-fouc="">
                        &nbsp;&nbsp; <span class="font-size-lg">Right Front Wheel</span> </label>
                    </div>
                  </div>
                </li>
                <li class="media form-group">
                  <div class="mr-3 align-self-center img-width text-right">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label"> <span class="font-size-lg">Left Rear Wheel</span>
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_left_rear" value="1" data-fouc="">
                      </label>
                    </div>
                  </div>
                  <div class="media-body">
                    <a href="javascript:;">
                      <input type="image" name="power_unit_left_rear" class="chooseImage" style="width: 25%; margin-right: unset;" src="{{asset('global_assets/images/tire_img.jpg')}}">
                      <input type="file" name="power_unit_left_rear[]" id="power_unit_left_rear" class="d-none" multiple>
                    </a>
                    <input type="image" name="" class="custom-style-1 align-self-center" src="{{asset('global_assets/images/line1.png')}}">
                    <a href="javascript:;">
                      <input type="image" name="power_unit_right_rear" style="width: 25%; margin-left: unset;" class="chooseImage float-right" src="{{asset('global_assets/images/tire_img.jpg')}}">
                      <input type="file" name="power_unit_right_rear[]" id="power_unit_right_rear" class="d-none" multiple>
                    </a> </div>
                  <div class="align-self-center ml-3 img-width">
                    <div class="form-check form-check-inline form-check-right">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_rear" value="1" data-fouc="">
                        &nbsp;&nbsp; <span class="font-size-lg">Right Rear Wheel</span> </label>
                    </div>
                  </div>
                </li>
                <div class="text-center">
                  <h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="trailer_html" style="margin-top: 10px;padding: 12px;">
          <div class="col-md-12" style="background-color: #fafafa;">
            <div class="col-md-8 offset-md-2">
              <div class="text-center">
                <h5>SELECT WHEEL YOU WORKED ON</h5>
              </div>
              <li class="media">
                <div class="mr-3 align-self-center img-width text-right">
                  <div class="form-check form-check-inline form-check-right">
                    <label class="form-check-label"> <span class="font-size-lg">Left Front Wheel</span>
                      <input type="checkbox" class="form-check-input-styled-danger" name="trailer_left_front" value="1" data-fouc="">
                    </label>
                  </div>
                </div>
                <div class="media-body text-center">
                  <a>
                    <input type="image" name="trailer_left_front" class="chooseImage" style="width: 25%; margin-right: unset;" src="{{asset('global_assets/images/tire_img.jpg')}}">
                    <input type="file" name="trailer_left_front[]" id="trailer_left_front" class="d-none" multiple>
                  </a>
                  <input type="image" name="" class="align-self-center custom-style-1" src="{{asset('global_assets/images/line1.png')}}">
                  <a href="javascript:;">
                    <input type="image" name="trailer_right_front" class="chooseImage float-right" style="width: 25%; margin-left: unset;" src="{{asset('global_assets/images/tire_img.jpg')}}">
                    <input type="file" name="trailer_right_front[]" id="trailer_right_front" class="d-none" multiple>
                  </a> </div>
                <div class="align-self-center ml-3 img-width">
                  <div class="form-check form-check-inline form-check-right">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input-styled-danger" name="trailer_right_front" value="1" data-fouc="">
                      &nbsp;&nbsp; <span class="font-size-lg">Right Front Wheel</span> </label>
                  </div>
                </div>
              </li>
              <li class="media form-group">
                <div class="mr-3 align-self-center img-width text-right">
                  <div class="form-check form-check-inline form-check-right">
                    <label class="form-check-label"> <span class="font-size-lg">Left Rear Wheel</span>
                      <input type="checkbox" class="form-check-input-styled-danger" name="trailer_left_rear" value="1" data-fouc="">
                    </label>
                  </div>
                </div>
                <div class="media-body"> <a href="javascript:;">
                    <input type="image" src="{{asset('global_assets/images/tire_img.jpg')}}" style="width: 25%; margin-right: unset;" name="trailer_left_rear" class="chooseImage">
                    <input type="file" name="trailer_left_rear[]" id="trailer_left_rear" class="d-none" multiple>
                  </a>
                  <input type="image" name="" class="align-self-center custom-style-1" src="{{asset('global_assets/images/line1.png')}}">
                  <a href="javascript:;">
                    <input type="image" src="{{asset('global_assets/images/tire_img.jpg')}}" style="width: 25%; margin-left: unset;" name="trailer_right_rear" class="chooseImage float-right">
                    <input type="file" name="trailer_right_rear[]" id="trailer_right_rear" class="d-none" multiple>
                  </a> </div>
                <div class="align-self-center ml-3 img-width">
                  <div class="form-check form-check-inline form-check-right">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input-styled-danger" name="trailer_right_rear" value="1" data-fouc="">
                      &nbsp;&nbsp; <span class="font-size-lg">Right Rear Wheel</span> </label>
                  </div>
                </div>
              </li>
              <div class="text-center">
                <h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <h5>HOW MANY FOOT POUNDS DID YOU TIGHTEN LUG NUTS TO?</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row form-group">
              <div class="col-md-2 offset-md-5">
                <div class="input-group">
                  <input type="text" name="weight" class="form-control input_fields" required id="add_form_weight">
                  <span class="input-group-append"> <span class="input-group-text c-font">lbs.</span> </span> </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2 offset-md-5">
                <input type="text" name="unit_number" class="form-control input_fields" placeholder="Unit Number" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2 offset-md-5">
                <input type="text" name="name" class="form-control input_fields" placeholder="Your Name" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2 offset-md-5">
                <select name="manager_id" onchange="" id="manager_id" class="select_select2_select input_fields" required="">
                  <option disabled selected hidden>Select Manager</option>


                  @if(count($manager_detail) > 0)
                  @foreach($manager_detail as $manager)


                  <option value="{{ $manager->id }}"><span>{{ $manager->first_name." ".$manager->last_name }}</span></option>


                  @endforeach
                  @endif


                </select>
              </div>
            </div>
            <div class="row form-group d-none">
              <div class="col-md-2 offset-md-5">
                <select name="location_id" id="manager-location" class="select_select2_select">
                  <option disabled selected hidden>Select Location</option>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2 offset-md-5">
                <input type="text" name="comments" class="form-control input_fields" placeholder="Comments">
              </div>
            </div>
            <div class="row text-center">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-ladda btn-ladda-spinner" data-style="expand-right" id="display_data" data-spinner-color="#ffff" onclick="showReportType()"><i class="icon-checkmark mr-2"></i>Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="modal_full" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark" align="center">
        <h2 class="modal-title font-weight-semibold form-group" style="text-transform: uppercase;font-weight: bold;">Report Confirmation</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body modal-bg">
        <div class="row">
          <div class="table-responsive col-md-8">
            <table class="table">
              <tbody>
                <tr>
                  <td><b>Weight</b></td>
                  <td>
                    <div contenteditable="true" class="content-editable" id="weight" onkeyup="show_input_fields_revert($(this))" ></div>
                  </td>
                </tr>
                <tr>
                  <td><b>Unit Number</b></td>
                  <td>
                    <div contenteditable="true" class="content-editable" id="unit_number" onkeyup="show_input_fields_revert($(this))"></div>
                  </td>
                </tr>
                <tr>
                  <td><b>Technician Name</b></td>
                  <td>
                    <div contenteditable="true" class="content-editable" id="name" onkeyup="show_input_fields_revert($(this))"></div>
                  </td>
                </tr>
                <tr>
                  <td><b>Manager</b></td>
                  <td><select class="form-control form-control-uniform" data-fouc id="manager_id_popup" onchange="show_input_fields_revert($(this))">
                      <option disabled selected hidden>Select Manager</option>
                      @if(count($manager_detail) > 0)
                      @foreach($manager_detail as $manager)
                      <option value="{{ $manager->id }}"><span>{{ $manager->first_name." ".$manager->last_name }}</span></option>
                      @endforeach
                      @endif
                    </select></td>
                </tr>
                <tr>
                  <td><b>Comments</b></td>
                  <td>
                    <div contenteditable="true" class="content-editable" id="comments" onkeyup="show_input_fields_revert($(this))"></div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <div id="imagesArea"> </div>

      </div>
      <div class="modal-footer mt-10">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="button" onclick="submitForm()" class="btn bg-dark">Submit Report</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">

<script type="text/javascript">
  
  $("#trailer_powerunit").validate({
      ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
      errorClass: 'validation-invalid-label',
      successClass: 'validation-valid-label',
      validClass: 'validation-valid-label',
      highlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      unhighlight: function(element, errorClass) {
          $(element).removeClass(errorClass);
      },
      // success: function(label) {
      //     label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
      // },
      errorPlacement: function(error, element) {
          if (element.parents().hasClass('form-check')) {
              error.appendTo( element.parents('.form-check').parent() );
          }
          else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
              error.appendTo( element.parent() );
          }
          else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
              error.appendTo( element.parent().parent() );
          }
          else {
              error.insertAfter(element);
          }
      }
    });

  $('#display_data').on('click',function (e) {
    var validator = $("#trailer_powerunit").valid();
    if (validator == true) {
      $('#modal_full').modal('show');
    }
  });

  function spinner() {
    var l = Ladda.create(document.querySelector('#submit'));
    l.start();
  }

  $('.form-check-input-styled-danger').uniform({
    wrapperClass: 'border-danger-600 text-danger-800'
  });

  $('#trailer_radio').click(function() {
    if ($('#power_unit_html').css("display", "block")) {
      $("#trailer_html").css("display", "block");
      $("#power_unit_html").css("display", "none");
    }
  });

  $('#power_unit_radio').click(function() {
    if ($('#trailer_html').css("display", "block")) {
      $("#trailer_html").css("display", "none");
      $("#power_unit_html").css("display", "block");
    }
  });

  $('.select_select2_select').select2({
    minimumResultsForSearch: Infinity
  });

  $(".chooseImage").on("click", function(e) {
    var name = $(this).attr("name");
    $("#" + name + "").click();
    e.preventDefault();
  });

  $(".chooseImage").next("input").on("change", function() {
    var inp_name = $(this).attr("id");
    $('input[name=' + inp_name + ']').prop('checked', true);
    $.uniform.update('input[name=' + inp_name + ']');
  });

  function submitForm() {
    $("#trailer_powerunit").submit();
  }

  function show_input_fields() {
    var inputs = $(".input_fields");
    $.each(inputs, function() {
      var manager_id = $("#manager_id").val();
      if ($(this).attr("id") != "manager_id") {
        $("#" + $(this).attr("name") + "").html($(this).val());
      }
      $("#manager_id_popup option[value=" + manager_id + "]").prop('selected', true);
    })
  }

  function show_input_fields_revert(e) {
    $("input[name=" + e.attr('id') + "]").val(e.html());
    if (e.attr("id") == "manager_id_popup") {
      var manager_id = e.val();
      $("#manager_id option[value=" + manager_id + "]").prop('selected', true);
      $('#manager_id').trigger('change');
    }
  }

  function showReportType() {
    show_input_fields();
    var typeArray;
    if ($("#trailer_radio").is(":checked") == true) {
      typeArray = $vehicleType.trailer;
    } else if ($("#power_unit_radio").is(":checked") == true) {
      typeArray = $vehicleType.power_unit;
    }
    html = '<div class="row" align="center"><div class="col-md-12"><h2><b>' + typeArray.imageHeading + '</b></h2></div></div>';
    html += '<div class="row">';
    $.each(typeArray.imagesType, function(k, v) {
      if ($("#" + k + "")[0].files.length > 0) {
        html += '<div class="col-md-6"><div class="card"><div class="card-header bg-transparent header-elements-inline"><h6 class="card-title">' + v + '</h6></div><div class="card-body"><div class="row" id="' + k + '_image"></div> </div><div class="card-footer"><div class="row" align="center"><div class="col-md-12"><input type="file" class="form-control-uniform" data-fouc multiple id="popup_upload_' + k + '" inputId="' + k + '" onchange="popup_file_upload($(this))"></div></div></div></div></div>';
      }

    });
    html += '</div>';

    $("#imagesArea").html(html);
    $('.form-control-uniform').uniform();
    $.each(typeArray.imagesType, function(k1, v1) {
      load_images(k1, v1);
    });
  }

  function popup_file_upload(input) {
    var typeArray;
    var title;
    var slug = input.attr("inputId");
    var OFiles = Array.from($("#" + slug + "")[0].files);
    var NFiles = Array.from(input[0].files);
    var files = OFiles.concat(NFiles);


    if ($("#trailer_radio").is(":checked") == true) {
      typeArray = $vehicleType.trailer;
    } else if ($("#power_unit_radio").is(":checked") == true) {
      typeArray = $vehicleType.power_unit;
    }

    $.each(typeArray.imagesType, function(k, v) {
      if (k == slug) {
        title = v;
      }
    });


    input.val('').clone(true);
    $("#" + slug + "").val('').clone(true);
    $("#" + slug + "")[0].files = new FileListItem(files);
    $("#" + slug + "_image").html('');
    load_images(slug, title);
  }

  function load_images(slug, title) {
    var files = $("#" + slug + "")[0].files;
    if (files.length <= 0) {
      $.uniform.update($('input[name=' + slug + ']').prop('checked', false));
    }
    $.each(files, function(k, v) {
      var extension = v.name.split('.');
      extension = extension[extension.length - 1];
      var reader = new FileReader();
      reader.onload = function(f) {
        load_files_by_type(extension, slug, f.target.result, title, k);
      }
      reader.readAsDataURL(v);
    });
  }

  function load_files_by_type(extension, slug, result, title, k) {
    extension = extension.toLowerCase();
    if (extension == 'png' || extension == 'jpg' || extension == 'jpeg' || extension == 'gif') {
      $("#" + slug + "_image").append('<div class="col-md-5 card-img-actions m-1" id="' + slug + '_' + k + '"><img class="card-img img-fluid" id="image_preview_remove" src="' + result + '" alt="" width="100" style="height:140px"><div class="card-img-actions-overlay card-img"><a href="javascript:;" onclick="removeImage(\'' + slug + '\', \'' + k + '\', \'' + title + '\')" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group"><i class="icon-bin2"></i></a></div></div>');
    } else if (extension == 'mp4' || extension == 'flv' || extension == 'avi' || extension == 'mkv') {
      $("#" + slug + "_image").append('<div class="col-md-6"><video style="height:130px;width:200px;" controls><source src="' + result + '" ></video></div>');
    }
  }

  function removeImage(slug, key, title) {
    $files = Array.from($("#" + slug + "")[0].files);
    $.each($files, function(k, v) {
      if (k == key)
        $files.splice(k, 1);
    });
    $("#" + slug + "").val('').clone(true);
    $("#" + slug + "")[0].files = new FileListItem($files);
    $("#" + slug + "_image").html('');
    load_images(slug, title);
  }



  function FileListItem(a) {
    a = [].slice.call(Array.isArray(a) ? a : arguments)
    for (var c, b = c = a.length, d = !0; b-- && d;) d = a[b] instanceof File
    if (!d) throw new TypeError("expected argument to FileList is File or array of File objects")
    for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer; c--;) b.items.add(a[c])
    return b.files
  }
</script>
@endsection
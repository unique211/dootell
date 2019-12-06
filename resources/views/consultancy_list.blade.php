@include('layouts.header')

<body>



    {{-- START PAGE CONTAINER --}}
    <div class="page-container page-navigation-toggled page-container-wide">
        {{-- START PAGE SIDEBAR --}}


        @include('layouts.sidebar')

        {{-- END PAGE SIDEBAR --}}
        {{-- PAGE CONTENT --}}
        <div class="page-content">
            {{-- START X-NAVIGATION VERTICAL --}}

            @include('layouts.topbar')
            {{-- END X-NAVIGATION VERTICAL --}}
            {{-- START BREADCRUMB --}}
            <ul class="breadcrumb">
                @if(session()->get('role')=="Consultancy")

                <li class="active">Consultancy Profile</li>
                @else
                <li class="active">Consultancy List</li>
                @endif

            </ul>
            {{--  END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}
                <div class="row tablehideshow" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if(session()->get('role')=="Consultancy")
                                <h3 class="panel-title">Consultancy Profile</h3>
                                @else
                                <h3 class="panel-title">Registered Consultancy List </h3>
                                @endif
                                {{-- <ul class="panel-controls">
                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Detail</button></li>
                                </ul> --}}
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                </div>
                {{--NEWS SECTION END--}}
                {{-- strat notification --}}
                <div class="row formhideshow" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Consultancy List</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form action="" name="master_form" id="master_form">
                                    <div class="form-group row">
                                        <br>
                                        <label class="col-lg-3">Date*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="date" autocomplete="off" name="date" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <label class="col-lg-3 ">Consultancy Name*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="cunsultancy_name" id="cunsultancy_name"
                                                class="form-control input-sm" placeholder="Consultancy Name" required />
                                            <input type="hidden" name="package_id" id="package_id" value="">
                                            <br>
                                        </div>

                                        <label class="col-lg-3 ">E-mail*</label>
                                        <div class="col-lg-3">
                                            <input type="email" name="email" id="email" class="form-control input-sm"
                                                placeholder="Email" required />
                                            <label class="control-label" id="chkemail" style="display:none; ">
                                                <font color="red">Email is Already Exists!!
                                                </font>
                                            </label>
                                        </div>
                                        <label class="col-lg-3 ">Mobile Number*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="mobile" id="mobile" class="form-control input-sm"
                                                placeholder="Mobile Number" required />
                                            <br>
                                        </div>

                                        <label class="col-lg-3 ">Consultancy Address*</label>
                                        <div class="col-lg-3">

                                            <input type="text" name="cunsultancy_address" id="cunsultancy_address"
                                                class="form-control input-sm" placeholder="Consultancy Address"
                                                required />
                                        </div>
                                        <label class="col-lg-3 ">City*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="city" id="city" class="form-control input-sm"
                                                placeholder="City" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Password*</label>
                                        <div class="col-lg-3">
                                            <input type="password" name="password" id="password"
                                                class="form-control input-sm" placeholder="Password" required />
                                        </div>
                                        <label class="col-lg-3 ">Confirm Password*</label>
                                        <div class="col-lg-3">
                                            <input type="password" name="c_password" id="c_password"
                                                class="form-control input-sm" placeholder="Confirm Password" required />
                                            <label class="control-label" id="conformpass" style="display:none;">
                                                <font color="red">Password and Confirm Password Does not same !!
                                                </font>
                                            </label>
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Enter reference*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="reference" id="reference"
                                                class="form-control input-sm" placeholder="Enter reference" required />

                                        </div>

                                        <label class="col-lg-3 ">Upload Image <span style="color:red;">(Please upload
                                                file upto
                                                1 MB Size)</span></label>
                                        <div class="col-lg-3">


                                            <input type="file" name="image" id="image" />
                                            <input type="hidden" name="filehidden1" id="filehidden1" value="">
                                            <br>
                                        </div>
                                        <div class="col-lg-6 text-left">

                                            <input type="checkbox" name="t_and_c" id="t_and_c" value="Bike" /> I accept
                                            all terms and
                                            conditions.<br>
                                        </div>



                                    </div>
                                    <div class="btn-group pull-right">
                                        <input type="hidden" id="save_update" name="save_update" value="" />
                                        <button class="btn btn-success" style="display:none;" id="submit_btn"
                                            type="submit">Register</button>

                                        <button class="btn btn-info " id="reset">Reset</button>
                                        <br><br>


                                    </div>
                                </form>
                            </div>

                        </div>
                        {{--panel panel default--}}
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    {{------------------------form1-end-------------------------------}}
                    {{--------------------------------------------------------------------------------------------------------------------------}}
                </div>
                {{-- end notification --}}
            </div>
            {{-- END PAGE CONTENT WRAPPER --}}
        </div>
        {{-- END PAGE CONTENT --}}
    </div>
    {{-- END PAGE CONTAINER --}}
    {{-- MESSAGE BOX--}}

    @include('layouts.message_box')
    {{-- END MESSAGE BOX--}}
    {{-- START SCRIPTS --}}

    @include('layouts.footer_scripts')

    {{-- END SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
      $('#image').change(function() {

        if ($(this).val() != '') {
        upload(this);

        }
        });

        function upload(img) {
$(".wait").show();
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');

        $.ajax({
        url: "{{url('uploadingfile_consultancy')}}",
        data: form_data,
        type: 'POST',
        contentType: false,
        processData: false,



        success: function(data) {
$(".wait").hide();
        $('#file').val('');
if(data==0 || data=="0"){
swal("File Size Max", "Hey, File Size must be Less Then 1 MB !!", "error");
$('#filehidden1').val('');
}else{
$('#filehidden1').val(data);
}


        }
        });
        }

    });
    var add_data="{{ route('consultancy.store') }}";
var role="<?php echo $val=Session::get('role');?>";
    var delete_data="{{ url('consultancy_delete_data') }}";

    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/consultancy_register.js',true) }}">
    </script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
    <script>
        $('.date').datepicker({
                       'todayHighlight': true,
                       format: 'dd/mm/yyyy',
                       autoclose: true,
                  });
                  var date = new Date();
                  date = date.toString('DD/MM/YYYY');
                  $(".date").val(date);
                  //  $("#fdate").val(date);
    </script>
</body>

</html>

@include('layouts.header')

<body>



    {{-- START PAGE CONTAINER --}}
    <div class="container  ">
        {{-- START PAGE SIDEBAR --}}


        {{--  @include('layouts.sidebar')  --}}

        {{-- END PAGE SIDEBAR --}}
        {{-- PAGE CONTENT --}}
        <div class="content">
            {{-- START X-NAVIGATION VERTICAL --}}

            {{--  @include('layouts.topbar')  --}}
            {{-- END X-NAVIGATION VERTICAL --}}
            {{-- START BREADCRUMB --}}
            <ul class="panel-title"
                style="padding-top:5px;border-radius: 0;background-color: #DA0833;height: 30px; text-align:center;width:100%;">

                <h4><b>CONSULTANCY REGISTER</b></h4>
                <br>
            </ul>
            {{--  END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}



                <form action="" name="master_form" id="master_form">
                    <div class="form-group row">
                        <br>
                        <label class="col-lg-3">Date*</label>
                        <div class="col-lg-3">
                            <div class="input-group date " data-provide="datepicker" required>
                                <input type="text" class="form-control input-sm placeholdesize date1" id="date"
                                    autocomplete="off" name="date" required />
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>

                        </div>
                        <label class="col-lg-3 ">Consultancy Name*</label>
                        <div class="col-lg-3">
                            <input type="text" name="cunsultancy_name" id="cunsultancy_name"
                                class="form-control input-sm" placeholder="Consultancy Name" required />
                            <input type="hidden" name="package_id" id="package_id" value="{{ $package_id }}">
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
                                class="form-control input-sm" placeholder="Consultancy Address" required />
                        </div>
                        <label class="col-lg-3 ">City*</label>
                        <div class="col-lg-3">
                            <input type="text" name="city" id="city" class="form-control input-sm" placeholder="City"
                                required />
                            <br>
                        </div>
                        <label class="col-lg-3 ">Password*</label>
                        <div class="col-lg-3">
                            <input type="password" name="password" id="password" class="form-control input-sm"
                                placeholder="Password" required />
                        </div>
                        <label class="col-lg-3 ">Confirm Password*</label>
                        <div class="col-lg-3">
                            <input type="password" name="c_password" id="c_password" class="form-control input-sm"
                                placeholder="Confirm Password" required />
                            <label class="control-label" id="conformpass" style="display:none;">
                                <font color="red">Password and Confirm Password Does not same !!
                                </font>
                            </label>
                            <br>
                        </div>
                        <label class="col-lg-3 ">Enter reference*</label>
                        <div class="col-lg-3">
                            <input type="text" name="reference" id="reference" class="form-control input-sm"
                                placeholder="Enter reference" required />

                        </div>

                        <label class="col-lg-3 ">Upload Image <span style="color:red;">(Please upload file upto
                                1 MB Size)</span></label>
                        <div class="col-lg-3">


                            <input type="file" name="image" id="image" />
                            <input type="hidden" name="filehidden1" id="filehidden1" value="">
                            <br>
                        </div>
                        <div class="col-lg-6 text-left">

                            <input type="checkbox" name="t_and_c" id="t_and_c" value="Bike" /> I accept all terms and
                            conditions.<br>
                        </div>

                    </div>
                    <div class="btn-group pull-right">
                        <input type="hidden" id="save_update" value="" />
                        <button class="btn btn-success" style="display:none;" id="submit_btn"
                            type="submit">Register</button>

                        <button class="btn btn-info " id="reset">Reset</button>
                        <br><br>
                        Already Registered ?
                        <a href="{{ url('/') }}" style='color:green;'><b><i> Log-In
                                </i></b></a>
                        <br>
                    </div>
                </form>









            </div>
            {{--NEWS SECTION END--}}

            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">OTP Verification</h4>
                        </div>
                        <form id="verify_form" name="verify_form">
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Verify OTP*</label>
                                    <input type="text" name="otp" value="" id="otp" placeholder="Verify OTP"
                                        class="form-control" />
                                </div>
                                <div class="timer-container countdown" id="#run-the-timer" style="color: red;">
                                    <span class="minute">01</span>:<span class="second">00</span>

                                </div>
                                <span class="timeout_message_show" style="display:none; color: red;">We are
                                    Sorry, Your time is up ! Please Click on Resend Button</span><br />
                                <span class="wrong_otp" style="display:none; color: red;">You Entered OTP is Wrong
                                    Please Try Again!</span>
                            </div> <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    id="close_model">Close</button>
                                <input type="hidden" name="hidden_id2" id="hidden_id2" value="">

                                <input type="submit" name="add" value="Verify" id="add" class="btn btn-info" />
                                <button type="button" class="btn btn-info" id="resend"
                                    style="margin-top:5px; float:left; ">Resend</button>



                            </div>
                        </form>
                        <form action="{{ url('payment_consultancy') }}" method="POST" id="hidden_form"
                            name="hidden_form">
                            @csrf
                            <input type="hidden" name="return_id" id="return_id" value="">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        {{-- END PAGE CONTENT WRAPPER --}}
    </div>
    {{-- END PAGE CONTENT --}}

    {{-- END PAGE CONTAINER --}}
    {{-- MESSAGE BOX--}}

    {{--  @include('layouts.message_box')  --}}
    {{-- END MESSAGE BOX--}}
    {{-- START SCRIPTS --}}

    @include('layouts.footer_scripts')

    {{-- END SCRIPTS --}}

</body>
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

    var delete_data="{{ url('consultancy_delete_data') }}";
var role="<?php echo Session::get('role');?>";
</script>

<script>
    $('.date').datepicker({
                       'todayHighlight': true,
                       format: 'dd/mm/yyyy',
                       autoclose: true,
                  });
                  var date = new Date();
                  date = date.toString('dd/MM/yyyy');
                  $("#date").val(date);
                  //  $("#fdate").val(date);
</script>
<script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/consultancy_register.js') }}">
</script>

</html>

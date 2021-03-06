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
                @if(session()->get('role')=="Individual")

                <li class="active">JobSeeker Profile</li>
                @else
                <li class="active">JobSeeker List</li>
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
                                @if(session()->get('role')=="Individual")
                                <h3 class="panel-title">JobSeeker Profile</h3>
                                @else
                                <h3 class="panel-title">JobSeeker List</h3>
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
                                <h3 class="panel-title">JobSeeker List</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form action="" name="master_form" id="master_form">

                                    <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                        <h4><b>Registration Details</b></h4>

                                    </div><br>


                                    <div class="form-group row">
                                        <label class="col-lg-3 ">E-mail*</label>
                                        <div class="col-lg-3">
                                            <input type="email" name="email" id="email" class="form-control input-sm"
                                                placeholder="Email" required />
                                            <label class="control-label" id="chkemail" style="display:none; ">
                                                <font color="red">Email is Already Exists!!
                                                </font>
                                            </label>
                                        </div>

                                        <label class="col-lg-3">Date</label>
                                        <div class="col-lg-3">
                                            {{--  <div class="input-group date " data-provide="datepicker" required>  --}}
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="date" autocomplete="off" name="date" readonly />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <label class="col-lg-3 ">Full Name*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="full_name" id="full_name"
                                                class="form-control input-sm" placeholder="Full Name" required />
                                            <input type="hidden" name="package_id" id="package_id" value="">
                                        </div>
                                        <label class="col-lg-3 ">Mobile Number*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="mobile" id="mobile" class="form-control input-sm"
                                                placeholder="Mobile Number" required />
                                            <br>
                                        </div>
                                        <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                            <h4><b>Higher Education</b></h4>

                                        </div><br>
                                        <label class="col-lg-3 ">Education*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="education" id="education"
                                                class="form-control input-sm" placeholder="Education" required />
                                        </div>
                                        <label class="col-lg-3 ">Course*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="course" id="course" class="form-control input-sm"
                                                placeholder="Course" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Specialization*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="specialization" id="specialization"
                                                class="form-control input-sm" placeholder="Specialization" required />
                                        </div>
                                        <label class="col-lg-3 ">Skill*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="skill" id="skill" class="form-control input-sm"
                                                placeholder="Skill" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Board / University*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="board" id="board" class="form-control input-sm"
                                                placeholder="Board / University" required />
                                        </div>
                                        <label class="col-lg-3 ">Institution*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="institution" id="institution"
                                                class="form-control input-sm" placeholder="Institution" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Year of Passing*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="passing_year" id="passing_year"
                                                class="form-control input-sm" placeholder="Year of Passing" required />
                                        </div>
                                        <label class="col-lg-3 ">Marks (in %) / CGPA*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="marks" id="marks" class="form-control input-sm"
                                                placeholder="Marks (in %) / CGPA" required />
                                            <br>
                                        </div>
                                        <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                            <h4><b>Experience</b></h4>

                                        </div><br>
                                        <label class="col-lg-3 ">Experience*</label>
                                        <div class="col-lg-3">
                                            <select name="experience" id="experience" class="form-control input-sm"
                                                required>
                                                <option value="">--Select--</option>
                                                <option value="Fresher">Fresher</option>
                                                <option value="Experience">Experience</option>
                                            </select>
                                            <br>
                                        </div>

                                        <div class="table-responsive col-lg-12" id="if_exp" style="display: none;">
                                            <table class="table table-striped " id="file_info">
                                                <thead>
                                                    <input type="hidden" id="row" class="row" value="0">
                                                    <tr>
                                                        <th>Company Name</th>
                                                        <th>Year of Experience</th>
                                                        <th>Month of Experience</th>

                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" id="ids" class="ids" />
                                                        <td>
                                                            <input type="text" class="form-control input-sm"
                                                                name="company_name" id="company_name"></td>

                                                        <td>
                                                            <input type="number" class="form-control input-sm"
                                                                name="years" id="years">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-sm"
                                                                name="months" id="months">
                                                        </td>




                                                        <td><button type="button" id="plus"
                                                                class="btn btn-success">Add</button></td>
                                                    </tr>
                                                </thead>
                                                <tbody id="file_info_tbody">

                                                </tbody>

                                            </table>
                                        </div>

                                        <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                            <br><br><br>
                                            <h4 style="text-left"><b>Personal Detail</b></h4>

                                        </div><br>
                                        <label class="col-lg-3">Date of Birth*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="dob" autocomplete="off" name="dob" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Gender *</label>
                                        <div class="col-lg-3">

                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="Male" />Male
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="Female" />Female


                                            <br><br><br><br>
                                        </div>

                                        <label class="col-lg-3 ">Permenant Address*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="address" id="address" class="form-control input-sm"
                                                placeholder="Permenant Address" required />
                                        </div>

                                        <label class="col-lg-3 ">Hometown*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="hometown" id="hometown"
                                                class="form-control input-sm" placeholder="Hometown" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Pin Code*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="pin" id="pin" class="form-control input-sm"
                                                placeholder="Pin Code" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">State*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="state" id="state" class="form-control input-sm"
                                                placeholder="State" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Aadhar Card No.*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="aadhar" id="aadhar" class="form-control input-sm"
                                                maxlength="12" minlength="12" placeholder="Aadhar Card No." required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Pan Card No.</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="pan" id="pan" class="form-control input-sm"
                                                placeholder="Pan Card No." />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Reference by*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="reference" id="reference"
                                                class="form-control input-sm" placeholder="Reference by" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Password*</label>
                                        <div class="col-lg-3">
                                            <input type="password" name="password" id="password"
                                                class="form-control input-sm" placeholder="Password" required />
                                            <br>
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
                                        <label class="col-lg-3 ">Interested Job Location*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="int_job_location" id="int_job_location"
                                                class="form-control input-sm" placeholder="Interested Job Location"
                                                required />
                                            <br>
                                        </div>

                                        <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                            <br><br><br>
                                            <h4 style="text-left"><b>Attach Documents</b></h4>

                                        </div><br>

                                        <label class="col-lg-12 ">Profile Photo* <span style="color:red;">(Choose only
                                                jpg,
                                                jpeg, png, gif format upto 1 MB Size file..)</span></label>
                                        <div class="col-lg-12">

                                            <input type="file" name="image1" id="image1"
                                                 />
                                            <input type="hidden" name="filehidden1" id="filehidden1" value="">

                                            <br>
                                        </div>
                                        <label class="col-lg-12 ">Resume* <span style="color:red;">(Choose only pdf, doc
                                                format upto 1 MB Size
                                                file..)</span></label>
                                        <div class="col-lg-12">

                                            <input type="file" name="image2" id="image2"  />
                                            <input type="hidden" name="filehidden2" id="filehidden2" value="">
                                            <br>
                                        </div>


                                        <div class="col-lg-6 text-left">

                                            <input type="checkbox" name="t_and_c" id="t_and_c" value="0" /> I accept
                                            all terms and
                                            conditions.<br>
                                        </div>

                                    </div>
                                    <div class="btn-group pull-right">
                                        <input type="hidden" id="save_update" name="save_update" value="" />
                                        <button class="btn btn-success" style="display:none;" id="submit_btn"
                                            type="submit">Register</button>

                                        <button class="btn btn-info " id="reset">Reset</button>
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
      $('#image1').change(function() {

        if ($(this).val() != '') {
        upload1(this);

        }
        });
        $('#image2').change(function() {

        if ($(this).val() != '') {
        upload2(this);

        }
        });

      function upload1(img) {
$(".wait").show();
    var form_data = new FormData();
    form_data.append('file', img.files[0]);
    form_data.append('_token', '{{csrf_token()}}');

    $.ajax({
    url: "{{url('uploadingfile_jobseeker_profile')}}",
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

    function upload2(img) {
$(".wait").show();
    var form_data = new FormData();
    form_data.append('file', img.files[0]);
    form_data.append('_token', '{{csrf_token()}}');

    $.ajax({
    url: "{{url('uploadingfile_jobseeker_resume')}}",
    data: form_data,
    type: 'POST',
    contentType: false,
    processData: false,



    success: function(data) {
$(".wait").hide();
    $('#file').val('');

    if(data==0 || data=="0"){
    swal("File Size Max", "Hey, File Size must be Less Then 1 MB !!", "error");
  $('#filehidden2').val(data);
    }else{
  $('#filehidden2').val(data);
    }


    }
    });
    }



    });
    var add_data="{{ route('jobseeker.store') }}";
var add_experience="{{ url('add_experience') }}";
    var delete_data="{{ url('jobseeker_delete') }}";
var role="<?php echo $val=Session::get('role');?>";
    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/jobseeker_register.js') }}">
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
                  date = date.toString('dd/MM/yyyy');
                  $("#date").val(date);
                  //  $("#fdate").val(date);
    </script>
</body>

</html>

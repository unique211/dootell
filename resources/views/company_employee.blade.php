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
                <li class="active">Company Employee</li>
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
                                <h3 class="panel-title">Employee List</h3>
                                <ul class="panel-controls">
                                    <li> <button class="btn btn-success btnhideshow"
                                            style="background-color:#00B050; display: none;">
                                            Add Detail</button></li>
                                </ul>
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
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Other Employee List</h3>
                                {{-- <ul class="panel-controls">
                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Detail</button></li>
                                </ul> --}}
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master2">
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
                                <h3 class="panel-title">Employee</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                    <h4><b>Registration Details</b></h4>

                                </div><br>


                                <form action="" name="master_form" id="master_form">
                                    <div class="form-group row">
                                        <label class="col-lg-3 ">Full Name*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="full_name" id="full_name"
                                                class="form-control input-sm" placeholder="Full Name" required />
                                        </div>
                                        <label class="col-lg-3 ">Gender *</label>
                                        <div class="col-lg-3">

                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="Male" />Male
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="Female" />Female


                                            <br><br><br>
                                        </div>
                                        <label class="col-lg-3 ">Education*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="education" id="education"
                                                class="form-control input-sm" placeholder="Education" required />
                                        </div>
                                        <label class="col-lg-3 ">Designation*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="designation" id="designation"
                                                class="form-control input-sm" placeholder="Designation " required />
                                            <br>


                                        </div>
                                        <label class="col-lg-3 ">Experience (in years)*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="experience" id="experience"
                                                class="form-control input-sm" placeholder="Experience" required />

                                        </div>
                                        <label class="col-lg-3">Joining Date*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="date" autocomplete="off" name="date" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <label class="col-lg-3">Leaving Date</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="leave_date" autocomplete="off" name="leave_date" />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-3">
                                            <label>Have Experience Certificate ?*</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <select name="experience_certificate" id="experience_certificate"
                                                class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>

                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-sm-3">
                                                <label>Notice Period*</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="notice_period" id="notice_period" class="form-control"
                                                    required>
                                                    <option value="">--Select--</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                </select>
                                                <br>
                                            </div>
                                            <div id="if_yes" style="display: none">
                                                <label class="col-sm-3 ">Notice Period (Months/Years)</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="notice_months" id="notice_months"
                                                        class="form-control input-sm" placeholder="Notice Period" />
                                                    <br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label class="col-lg-3 ">Profile picture <span style="color:red;">(Please
                                                    upload file upto
                                                    1 MB Size)</span></label>

                                            <div class="col-sm-3">
                                                <input type="file" name="image" id="image" />
                                                <input type="hidden" name="filehidden1" id="filehidden1" value="">
                                                <br>
                                                <br>
                                            </div>
                                            <label class="col-lg-3 ">Aadhar Card No.*</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="aadhar" id="aadhar"
                                                    class="form-control input-sm" maxlength="12" minlength="12"
                                                    placeholder="Aadhar Card No." required />

                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Behaviour*</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="behaviour" id="behaviour" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Attendence*</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="attendence" id="attendence" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Sincerity*</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="sincerity" id="sincerity" class="form-control" required>
                                                <option value="">--Select--</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                            <br>
                                        </div>

                                        <div class="col-sm-3">
                                            <label>Dependability*</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select name="dependability" id="dependability" class="form-control"
                                                required>
                                                <option value="">--Select--</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Any Legel Affence / Reason of leaving job*</label>
                                        <div class="col-lg-9">

                                            <textarea name="reason" id="reason" class="form-control input-sm"
                                                placeholder="Reason of leaving job" required rows="5"></textarea>

                                        </div>



                                    </div>
                                    <div class="btn-group pull-right">
                                        <input type="hidden" id="save_update" name="save_update" value="" />
                                        <button class="btn btn-success" id="submit_btn" type="submit">Save</button>

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
        url: "{{url('uploadingfile_company_employee')}}",
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
    var add_data="{{ route('company_employee.store') }}";

    var delete_data="{{ url('company_employee_delete_data') }}";
var change_status="{{ url('change_status_employee') }}";
    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/company_employee.js') }}">
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
                        $("#leave_date").val(date);
    </script>
</body>

</html>

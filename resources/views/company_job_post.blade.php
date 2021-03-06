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
                <li class="active">Company Job Post</li>
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
                                <h3 class="panel-title">Job Post List</h3>
                                <ul class="panel-controls">
                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
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
                                <h3 class="panel-title">Other Job Post List</h3>
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
                                <h3 class="panel-title">Job Post</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                    <h4><b>Job Posting</b></h4>

                                </div><br>


                                <form action="" name="master_form" id="master_form">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3">Job Post Date*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="date" autocomplete="off" name="date" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <label class="col-lg-3 ">Job Title/ Designation*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="job_title" id="job_title"
                                                class="form-control input-sm" placeholder="Job Title/ Designation"
                                                required />
                                            <br>

                                        </div>


                                        <label class="col-lg-3 ">Job Description*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="description" id="description"
                                                class="form-control input-sm" placeholder="Job Description" required />

                                        </div>
                                        <label class="col-lg-3 ">Keywords*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="keywords" id="keywords"
                                                class="form-control input-sm" placeholder="Keywords" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-2">Work Experience :</label>
                                        <label class="col-lg-1">From*</label>
                                        <div class="col-lg-3">
                                            <select name="from" id="from" class="form-control" required>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>

                                            </select>

                                        </div>
                                        <label class="col-lg-3 ">To*</label>
                                        <div class="col-lg-3">
                                            <select name="to" id="to" class="form-control" required>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>

                                            </select>
                                            <br>
                                        </div>



                                        <label class="col-lg-3 ">Annual CTC*</label>

                                        <div class="col-sm-1">

                                            <select name="ctc" id="ctc" class="form-control" required>
                                                <option value="Rs">Rs.</option>
                                                <option value="USD">USD</option>

                                            </select>

                                        </div>
                                        <label class="col-lg-1 ">From*</label>
                                        <div class="col-sm-3">
                                            <input type="number" name="from_ctc" id="from_ctc"
                                                class="form-control input-sm" placeholder="CTC From" required />

                                        </div>

                                        <label class="col-lg-1 ">To*</label>
                                        <div class="col-sm-3">
                                            <input type="number" name="to_ctc" id="to_ctc" class="form-control input-sm"
                                                placeholder="CTC To" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">No. of Vacancies*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="vacancies" id="vacancies"
                                                class="form-control input-sm" placeholder="No. of Vacancies" required />


                                        </div>

                                        <label class="col-lg-3 ">Job Location*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="location" id="location"
                                                class="form-control input-sm" placeholder="Job Location" required />
                                            <br>

                                        </div>
                                        <label class="col-lg-3 ">Industry*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="industry" id="industry"
                                                class="form-control input-sm" placeholder="Industry" required />


                                        </div>
                                        <label class="col-lg-3 ">Specify Qualification*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="qualification" id="qualification"
                                                class="form-control input-sm" placeholder="Specify Qualification"
                                                required />
                                            <br>

                                        </div>
                                        <label class="col-lg-3 ">Forward Applications on E-mail Id*</label>
                                        <div class="col-lg-3">
                                            <input type="email" name="email" id="email" class="form-control input-sm"
                                                placeholder="Forward Applications on E-mail Id" required />


                                        </div>
                                        <label class="col-lg-3 ">Venue *</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="vanue" id="vanue" class="form-control input-sm"
                                                placeholder="Venue" required />

                                            <br>
                                        </div>
                                        <label class="col-lg-2">Date :</label>
                                        <label class="col-lg-1">From*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="from_date" autocomplete="off" name="from_date" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <label class="col-lg-3 ">To*</label>
                                        <div class="col-lg-3">
                                            <div class="input-group date " data-provide="datepicker" required>
                                                <input type="text" class="form-control input-sm placeholdesize date1"
                                                    id="to_date" autocomplete="off" name="to_date" required />
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                            <br>
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
        url: "{{url('uploadingfile_company_customer')}}",
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
    var add_data="{{ route('company_postjob.store') }}";

    var delete_data="{{ url('company_postjob_delete') }}";
var change_status="{{ url('change_status_job_post') }}";
    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/company_job_post.js') }}">
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
                         $("#from_date").val(date);
                            $("#to_date").val(date);

    </script>
</body>

</html>

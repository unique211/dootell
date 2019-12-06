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
                <li class="active">Group Admin</li>
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
                                <h3 class="panel-title">Group Admin List</h3>
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
                </div>
                {{--NEWS SECTION END--}}
                {{-- strat notification --}}
                <div class="row formhideshow" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Create Group Admin</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">


                                <form action="" name="master_form" id="master_form">
                                    <div class="form-group row">

                                        <label class="col-lg-3 ">Group Admin Name*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="employee_name" id="employee_name"
                                                class="form-control input-sm" placeholder="Group Admin Name" required />
                                            <br>

                                        </div>


                                        <label class="col-lg-3 ">Joining Date*</label>
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
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 ">User Type*</label>
                                        <div class="col-lg-3">
                                            <select name="user_type" id="user_type" class="form-control input-sm"
                                                required>

                                                @if (session()->get('role')=="Group_Admin")
                                                <option value="">--Select--</option>
                                                <option value="Group_Admin">Group Admin</option>
                                                <option value="Employee">Employee</option>
                                                @else
                                                <option value="">--Select--</option>
                                                <option value="Group_Admin">Group Admin</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Employee">Employee</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div id="if_group_admin" style="display:none">
                                            <label class="col-lg-3 ">Group Name</label>
                                            <div class="col-lg-3">
                                                <select name="group_name[]" multiple class="form-control  group_name"
                                                    id="group_name">

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 ">Mobile Number*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="mobile" id="mobile" class="form-control input-sm"
                                                placeholder="Mobile Number" required />

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
                                    </div>
                                    <div class="form-group row">
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


                                    </div>
                                    <style>
                                        .main_menu {
                                            font-weight: bold;
                                            background: #33414e;
                                            color: white;
                                        }

                                        .sub_menu {
                                            margin-left: 20px;
                                        }
                                    </style>
                                    <div style="margin-top:0px;border-bottom:2px solid;width:100%;">
                                        <h4 class="modal-title">User Rights</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Menu Name</th>
                                                    <th>Readonly</th>
                                                    <th>Modify</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbd_user_rights">
                                                <tr>
                                                    <td><span class="main_menu">Menu Name</span></td>
                                                    <td><input type="radio" name="a" /></td>
                                                    <td><input type="radio" name="a" /></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="sub_menu">Menu Name</span></td>
                                                    <td><input type="radio" name="b" /></td>
                                                    <td><input type="radio" name="b" /></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="btn-group pull-right">
                                        <input type="hidden" id="save_update" name="save_update" value="" />
                                        <button class="btn btn-success" id="submit_btn" type="submit">Register</button>

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
    var add_data="{{ route('employee.store',true) }}";

    var delete_data="{{ url('employee_delete',true) }}";
    var delete_from_login="{{ url('delete_from_login',true) }}";
var delete_from_user_rights="{{ url('delete_from_user_rights',true) }}";
var role="<?php echo $val=Session::get('role');?>";
    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/employee.js',true) }}">
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

                      $('.group_name').multiselect({
                    includeSelectAllOption: false,
                    buttonWidth: '100%'
                    });

    </script>
</body>

</html>

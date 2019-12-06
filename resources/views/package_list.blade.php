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
                <li class="active">Package List</li>
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
                                <h3 class="panel-title">Package List</h3>
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
                                <h3 class="panel-title">Package List</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form"
                                        enctype="multipart/form-data">

                                        <div class="row">

                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label>Package Title*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        placeholder="Package Title" required>

                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Package Type*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <select name="package_type" id="package_type" class="form-control"
                                                        required>
                                                        <option value="">--Select--</option>
                                                        <option value="Consultancy">Consultancy</option>
                                                        <option value="Company">Company</option>
                                                        <option value="Individual">Jobseeker</option>
                                                        <option value="Subscriber">Subscriber</option>
                                                    </select>
                                                    <br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Package Validity*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" name="validity" id="validity"
                                                        class="form-control" placeholder="Package Validity in days"
                                                        required>

                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Package Price*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" name="price" id="price" class="form-control"
                                                        placeholder="Package Price" required>
                                                    <br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Image* <span style="color:red;">(Please upload file upto
                                                            1 MB Size)</span></label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="file" name="image" id="image" />
                                                    <input type="hidden" name="filehidden1" id="filehidden1" value="">
                                                </div>
                                                <div id="if_c" style="display:none;">
                                                    <div class="col-sm-3">
                                                        <label>Number of Candidate*</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" name="no_of_candidate" id="no_of_candidate"
                                                            class="form-control" placeholder="Number of Candidate"
                                                            required>
                                                    </div>
                                                </div>
                                                <div id="if_company" style="display:none;">
                                                    <div class="col-sm-3">
                                                        <label>Number of Customers*</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" name="no_of_customer" id="no_of_customer"
                                                            class="form-control" placeholder="Number of Customers"
                                                            required>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                        <div class="btn-group pull-right">
                                            <input type="hidden" id="save_update" name="save_update" value="" />
                                            <button class="btn btn-primary" id="btn_submit" type="submit">Save</button>

                                            <button type="button" class="btn btn-info " id="reset">Reset</button>
                                        </div>
                                    </form>
                                </div>
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
        url: "{{url('uploadingfile')}}",
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
    var add_data="{{ route('package_list.store') }}";

    var delete_data="{{ url('package_list_delete') }}";
var role="<?php echo $val=Session::get('role');?>";
    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/package_list.js') }}">
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

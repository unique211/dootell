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
                <li class="active">Company Customer</li>
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
                                <h3 class="panel-title">Customer List</h3>
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
                                <h3 class="panel-title">Other Customer List</h3>
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
                                <h3 class="panel-title">Customer</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div style="margin-top:5px;border-bottom:2px solid;width:100%;">
                                    <h4><b>Customers Register Form</b></h4>

                                </div><br>


                                <form action="" name="master_form" id="master_form">
                                    <div class="form-group row">
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
                                        <label class="col-lg-3 ">Customer Name*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="customer_name" id="customer_name"
                                                class="form-control input-sm" placeholder="Customer Name" required />
                                            <br>

                                        </div>


                                        <label class="col-lg-3 ">Amount*</label>
                                        <div class="col-lg-3">
                                            <input type="number" name="amount" id="amount" class="form-control input-sm"
                                                placeholder="Amount" required />

                                        </div>
                                        <label class="col-lg-3 ">Address*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="address" id="address" class="form-control input-sm"
                                                placeholder="Address" required />
                                            <br>
                                        </div>
                                        <label class="col-lg-3 ">Aadhar Card*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="aadhar" id="aadhar" class="form-control input-sm"
                                                maxlength="12" minlength="12" placeholder="Aadhar Card" required />

                                        </div>
                                        <label class="col-lg-3 ">Narration*</label>
                                        <div class="col-lg-3">
                                            <input type="text" name="narration" id="narration"
                                                class="form-control input-sm" placeholder="Narration" required />
                                            <br>
                                        </div>



                                        <label class="col-lg-3 ">Image <span style="color:red;">(Please upload file upto
                                                1 MB Size)</span></label>

                                        <div class="col-sm-3">
                                            <input type="file" name="image" id="image" />
                                            <input type="hidden" name="filehidden1" id="filehidden1" value="">
                                            <br>
                                            <br>
                                        </div>



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
    var add_data="{{ route('company_customers.store') }}";

    var delete_data="{{ url('company_customers_delete') }}";
    var change_status="{{ url('change_status_customer') }}";

    </script>

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/company_customer.js') }}">
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

    </script>
</body>

</html>

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

                <h4><b>COMPANY DETAILS</b></h4>
                <br>
            </ul>
            {{--  END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}


                @foreach($jobseeker_data as $val)
                <div class="form-group row">

                    <br>
                    <label class="col-lg-3 ">Full Name</label>
                    <div class="col-lg-3">
                        <label>{{ $val->full_name }}</label>


                    </div>

                    <label class="col-lg-3 ">E-mail</label>
                    <div class="col-lg-3">
                        <label>{{ $val->email }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 ">Mobile Number</label>
                    <div class="col-lg-3">
                        <label>{{ $val->mobile }}</label>
                        <br>
                    </div>

                    <label class="col-lg-3 ">Permenant Address</label>
                    <div class="col-lg-3">

                        <label>{{ $val->address }}</label>
                    </div>
                </div>

                @endforeach
                <br>
                <h4><b>Package Details</b></h4>
                <hr>

                @foreach($package_data as $val2)
                <div class="form-group row">
                    <label class="col-lg-3 ">Package Price</label>
                    <div class="col-lg-3">

                        <label>{{ $val2->package_price }}</label>
                    </div>
                    <?php
                                    date_default_timezone_set('Asia/Kolkata');
                                    $date2 = date("Y-m-d");
                                    $date3 = date('d/m/Y', strtotime($date2 . ' + ' . $val2->package_validity . ' days'));
                                    ?>
                    <label class="col-lg-3 ">Next Expire Date</label>
                    <div class="col-lg-3">
                        <label>{{ $date3 }}</label>
                    </div>
                </div>
                @endforeach

                <a class="btn-group pull-right">
                    <input type="hidden" id="save_update" value="" />
                    <button class="btn btn-success" id="pay_now" type="button">Pay
                        Now</button>

                    <a href="{{ url('/') }}"> <button class="btn btn-info pull-right" id="">Cancel</button>
                    </a>
                    <br><br>

            </div>


            <form action="{{ url('payment_jobseeker_renew') }}" method="POST" id="hidden_form" name="hidden_form">
                @csrf
                <input type="hidden" name="return_id" id="return_id" value="{{ $ref_id }}">
                <input type="hidden" name="package_id" id="package_id" value="{{ $package_id }}">
            </form>







        </div>
        {{--NEWS SECTION END--}}



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
<script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/consultancy_register.js',true) }}">
</script>

</html>

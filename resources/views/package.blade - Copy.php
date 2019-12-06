<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>



    {{-- START PAGE CONTAINER --}}
    <div class="container">
        {{-- START PAGE SIDEBAR --}}


        {{--  @include('layouts.sidebar')  --}}

        {{-- END PAGE SIDEBAR --}}
        {{-- PAGE CONTENT --}}
        <div class="content" style="margin-top:15%">
            {{-- START X-NAVIGATION VERTICAL --}}

            {{--  @include('layouts.topbar')  --}}
            {{-- END X-NAVIGATION VERTICAL --}}
            {{-- START BREADCRUMB --}}


            {{--  <ul class="panel-title" style="border-radius: 0;background-color: #DA0833;height: 30px; text-align:center;">

                <h4><b>Select Package</b></h4>
                <br>
            </ul>  --}}


            {{--  END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}
                <center>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            {{-- START SIMPLE DATATABLE --}}
                            <div class="panel panel-default" style="position: relative;">
                                <div class="panel-heading">
                                    <h3 class="panel-title"
                                        style="border-radius: 0;background-color: #DA0833; text-align:center;">
                                        <b>Select Package</b></h3>

                                </div>
                                <div class="panel-body">
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="card" style="width: 18rem;">
                                                <img src="{{ env('APP_URL') }}/resources/img/consultancy.jpg"
                                                    style="width: 285px; height:160px"
                                                    class="card-img-top img-responsive" alt="...">
                                                <div class="card-body">


                                                    <a href="{{ url('consultancy_package') }}"
                                                        class="btn btn-primary">Register as
                                                        Consultancy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card" style="width: 18rem;">
                                                <img src="{{ env('APP_URL') }}/resources/img/company.jpg"
                                                    class="card-img-top img-responsive"
                                                    style="width: 285px; height:160px" alt="...">
                                                <div class="card-body">


                                                    <a href="{{ url('company_package') }}"
                                                        class="btn btn-primary">Register
                                                        as Company</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card" style="width: 18rem;">
                                                <img src="{{ env('APP_URL') }}/resources/img/jobseeker.jpg"
                                                    class="card-img-top img-responsive"
                                                    style="width: 285px; height:160px" alt="...">
                                                <div class="card-body">


                                                    <a href="{{ url('jobseeker_package') }}"
                                                        class="btn btn-primary">Register as
                                                        Jobseeker</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="card" style="width: 18rem;">
                                                <img src="{{ env('APP_URL') }}/resources/img/subscriber.jpg"
                                                    class="card-img-top img-responsive"
                                                    style="width: 285px; height:160px" alt="...">
                                                <div class="card-body">


                                                    <a href="{{ url('subscriber_register') }}"
                                                        class="btn btn-primary">Register as
                                                        Subscriber</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            {{-- END SIMPLE DATATABLE --}}
                        </div>
                    </div>
                </center>


            </div>

            {{-- END PAGE CONTENT WRAPPER --}}
        </div>
        {{-- END PAGE CONTENT --}}
    </div>
    {{-- END PAGE CONTAINER --}}
    {{-- MESSAGE BOX--}}

    {{--  @include('layouts.message_box')  --}}
    {{-- END MESSAGE BOX--}}
    {{-- START SCRIPTS --}}

    {{--  @include('layouts.footer_scripts')  --}}

    {{-- END SCRIPTS --}}

</body>


</html>

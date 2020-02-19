<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

        {{--  <!------ Include the above in your HEAD tag ---------->  --}}

        <style>
            .productbox {
                background-color: #ffffff;
                padding: 10px;
                margin-bottom: 10px;
                -webkit-box-shadow: 0 8px 6px -6px #999;
                -moz-box-shadow: 0 8px 6px -6px #999;
                box-shadow: 0 8px 6px -6px #999;
            }

            .producttitle {
                font-weight: bold;
                padding: 5px 0 5px 0;
            }

            .productprice {
                border-top: 1px solid #dadada;
                padding-top: 5px;
                margin-top: 10px;
            }

            .pricetext {
                font-weight: bold;
                font-size: 1.4em;
            }
        </style>
    </head>





<body>





    <div class="row" style="margin-top: 5px">

        <center>
            <h1 class="panel-title" style="border-radius: 0;background-color: #DA0833; text-align:center;">
                <b>Select Package</b></h1>
            <div class="col-md-3 column productbox">
                <img src="{{ env('APP_URL') }}/resources/img/consultancy.jpg" class="img-responsive">

                <div class="productprice">
                    <div class=""><a href="{{ url('consultancy_package') }}" class="btn btn-danger btn-sm"
                            role="button">Register as
                            Consultancy</a></div>

                </div>
            </div>
            <div class="col-md-3 column productbox">
                <img src="{{ env('APP_URL') }}/resources/img/company.jpg" class="img-responsive">

                <div class="productprice">
                    <div class=""><a href="{{ url('company_package') }}" class="btn btn-danger btn-sm"
                            role="button">Register
                            as Company</a></div>

                </div>
            </div>
            <div class="col-md-3 column productbox">
                <img src="{{ env('APP_URL') }}/resources/img/jobseeker.jpg" class="img-responsive">

                <div class="productprice">
                    <div class=""><a href="{{ url('jobseeker_package') }}" class="btn btn-danger btn-sm"
                            role="button">Register as
                            Jobseeker</a></div>

                </div>
            </div>
            <div class="col-md-3 column productbox">
                <img src="{{ env('APP_URL') }}/resources/img/subscribe.png" class="img-responsive">

                <div class="productprice">
                    <div class=""><a href="{{ url('subscriber_register') }}" class="btn btn-danger btn-sm"
                            role="button">Register as
                            Subscriber</a></div>

                </div>
            </div>
        </center>


        {{--  <div class="page-content-wrap">

            <center>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">

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
        style="width: 285px; height:160px" class="card-img-top img-responsive"
        alt="...">
        <div class="card-body">


            <a href="{{ url('consultancy_package') }}" class="btn btn-primary">Register as
                Consultancy</a>
        </div>
    </div>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ env('APP_URL') }}/resources/img/company.jpg" class="card-img-top img-responsive"
                style="width: 285px; height:160px" alt="...">
            <div class="card-body">


                <a href="{{ url('company_package') }}" class="btn btn-primary">Register
                    as Company</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ env('APP_URL') }}/resources/img/jobseeker.jpg" class="card-img-top img-responsive"
                style="width: 285px; height:160px" alt="...">
            <div class="card-body">


                <a href="{{ url('jobseeker_package') }}" class="btn btn-primary">Register as
                    Jobseeker</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ env('APP_URL') }}/resources/img/subscriber.jpg" class="card-img-top img-responsive"
                style="width: 285px; height:160px" alt="...">
            <div class="card-body">


                <a href="{{ url('subscriber_register') }}" class="btn btn-primary">Register as
                    Subscriber</a>
            </div>
        </div>
    </div>

    </div>

    </div>
    </div>

    </div>
    </div>
    </center>


    </div> --}}

    {{-- END PAGE CONTENT WRAPPER --}}
    </div>


</body>


</html>

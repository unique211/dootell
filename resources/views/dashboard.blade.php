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
                <li class="active">Dashboard</li>
            </ul>
            {{--  END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}
                <div class="row tablehideshow">
                    @if(session()->get('role')=="Subscriber")

                    @if(is_null($subscribed))
                    <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">No Any Groups Subscribed</h3>

                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <p>No Any Notifications</p>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    @else

                    @foreach($subscribed as $value)
                    {{--  {{ $value }} --}}
                    {{--  @foreach($notification as $value2)  --}}
                    <a href="{{ url('notification') }}/{{ $value['group_id'] }}">



                        <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                            {{-- START SIMPLE DATATABLE --}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Group Name : {{ $value['group_name'] }}</h3>
                                    <ul class="panel-controls">
                                        {{-- <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Detail</button></li> --}}
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12 ">
                                        <h1>Notifications : {{ $value['notification'] }}</h1>
                                    </div>
                                </div>
                            </div>
                            {{-- END SIMPLE DATATABLE --}}
                        </div>
                        {{--  @endforeach  --}}
                    </a>
                    @endforeach
                    @endif

                    @elseif(session()->get('role')=="Company")



                    {{--  @foreach($count as $value)  --}}
                    {{--  {{ $value }} --}}
                    {{--  @foreach($notification as $value2)  --}}

                    <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Employes</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $employee }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Customers</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $customer }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Job Post</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $job }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    {{--  @endforeach  --}}
                    {{--  @endforeach  --}}
                    {{--  @endif  --}}
                    @elseif(session()->get('role')=="Consultancy")
                    <div class="col-md-4 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Student</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $students }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>

                    @elseif(session()->get('role')=="Individual")
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dashboard</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1></h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    @else
                    <div class="col-md-3 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Company</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <h1>{{ $company_register }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Consultancy</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $consultancy_register }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Subscriber</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $subscriber_register }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Jobseeker</h3>
                                <ul class="panel-controls">

                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <h1>{{ $jobseeker_register }}</h1>
                                </div>
                            </div>
                        </div>
                        {{-- END SIMPLE DATATABLE --}}
                    </div>
                    @endif

                </div>
                {{--NEWS SECTION END--}}
                {{-- strat notification --}}
                <div class="row formhideshow" style="display: none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1">
                        {{-- START SIMPLE DATATABLE --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dashboard</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Detail</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label>Date*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="input-group date " data-provide="datepicker" required>
                                                        <input type="text"
                                                            class="form-control input-sm placeholdesize date1"
                                                            id="salary_date" autocomplete="off" name="salary_date" />
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Salary*</label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" id="salary" name="salary" class="form-control"
                                                        placeholder="Salary" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group pull-right">
                                            <input type="hidden" id="save_update" value="" />
                                            <button class="btn btn-primary" type="submit">Save</button>

                                            <button class="btn btn-info " id="reset">Reset</button>
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
        var baseurl = "";

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

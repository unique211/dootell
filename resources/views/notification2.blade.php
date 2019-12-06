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


            <style>
                .detailBox {
                    width: 100%;
                    border: 1px solid #bbb;
                    margin: 50px;
                }

                .titleBox {
                    background-color: #fdfdfd;
                    padding: 10px;
                }

                .titleBox label {
                    color: #444;
                    margin: 0;
                    display: inline-block;
                }

                .commentBox {
                    padding: 10px;
                    border-top: 1px dotted #bbb;
                }

                .commentBox .form-group:first-child,
                .actionBox .form-group:first-child {
                    width: 80%;
                }

                .commentBox .form-group:nth-child(2),
                .actionBox .form-group:nth-child(2) {
                    width: 18%;
                }

                .actionBox .form-group * {
                    width: 100%;
                }

                .taskDescription {
                    margin-top: 10px 0;
                }

                .commentList {
                    padding: 0;
                    list-style: none;
                    max-height: 200px;
                    overflow: auto;
                }

                .commentList li {
                    margin: 0;
                    margin-top: 10px;
                }

                .commentList li>div {
                    display: table-cell;
                }

                .commenterImage {
                    width: 30px;
                    margin-right: 5px;
                    height: 100%;
                    float: left;
                }

                .commenterImage img {
                    width: 100%;
                    border-radius: 50%;
                }

                .commentText p {
                    margin: 0;
                }

                .sub-text {
                    color: #aaa;
                    font-family: verdana;
                    font-size: 11px;
                }

                .actionBox {
                    border-top: 1px dotted #bbb;
                    padding: 10px;
                }
            </style>
            @include('layouts.footer_scripts')
            <ul class="breadcrumb">
                <li class="active">Notifications List</li>
            </ul>
            {{-- END BREADCRUMB  --}}
            {{-- PAGE CONTENT WRAPPER --}}
            <div class="page-content-wrap">
                {{--NEWS SECTION--}}
                <div class="row tablehideshow">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        {{-- START SIMPLE DATATABLE --}}
                        @if(is_null($notification))
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">No Any Notifications</h3>
                                <ul class="panel-controls">
                                    {{-- <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                                                    Add Detail</button></li> --}}
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else
                        <?php
                        $group_name="";
                        $group_id="";
                        foreach($notification as $value){
                        $group_name=$value['group_name'] ;
                        $group_id=$value['group_id'];
                        }
                        ?>



                        <h2 style="text-align: center">Group Name: {{ $group_name  }}</h2>
                        <input type="hidden" name="group_id" id="group_id" value="{{ $group_id }}">
                        {{--  <div class="col-lg-3 ">

                        <div class="input-group date " data-provide="datepicker" required>
                            <input type="text" class="form-control input-sm placeholdesize date1" id="date"
                                autocomplete="off" name="date" required />
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                        <br>
                    </div> --}}


                        @foreach($notification as $value1)
                        <div class="panel panel-default">
                            <input type="hidden" class="post_id" name="post_id" id="post_id"
                                value="{{ $value1['id'] }}">
                            <div class="panel-heading">
                                <h3 class="panel-title">Post Title : <span id="post_title"></span>{{ $value1['title'] }}
                                </h3>
                                <ul class="panel-controls">
                                    <h4 style="padding-right:5px;">Date : <span
                                            id="post_date"></span>{{ $value1['new_date'] }}
                                    </h4>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="col-lg-3">
                                        <span id="post_img"></span>
                                        @if($value1['image']==null)
                                        <img src="{{ env('APP_URL') }}/resources/img/how-work3.png"
                                            style="height: 160px; width: 160px;" width="150px" height="150px" alt="">

                                        @else

                                        <img src="{{ env('APP_URL') }}/uploads/posts/{{ $value1['image'] }}"
                                            style="height: 160px; width: 160px;" width="150px" height="150px" alt="">

                                        @endif
                                    </div>

                                    <div class="col-lg-9 ">
                                        <h4>Description : </h4>
                                        <p><span id="post_description"></span>{{ $value1['description'] }}</p>

                                        <br>

                                        <div class="detailBox" style="margin-left: 0px; ">
                                            <div class="titleBox">
                                                <label>Comment Box</label>

                                            </div>

                                            <div class="actionBox">
                                                <ul class="commentList">
                                                    @if(is_null($value1['comments']))
                                                    <li>

                                                        <div class="commentText">
                                                            <p class=""></p>

                                                        </div>
                                                    </li>

                                                    @else
                                                    @foreach($value1['comments'] as $value2)
                                                    <li>
                                                        <div class="commenterImage">
                                                            <img
                                                                src="{{ env('APP_URL') }}/resources/img/how-work3.png" />
                                                        </div>
                                                        <div class="commentText">
                                                            <p class="">{{ $value2->comment }}</p> <span
                                                                class="date sub-text"><b>{{ $value2->name }}</b> - on
                                                                {{ $value2->comment_date }}</span>

                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                    {{--   <li>
                                                        <div class="commenterImage">
                                                            <img src="http://placekitten.com/45/45" />
                                                        </div>
                                                        <div class="commentText">
                                                            <p class="">Hello this is a test comment and this comment is
                                                                particularly very long and it goes on
                                                                and on and on.</p> <span class="date sub-text">on March
                                                                5th,
                                                                2014</span>

                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="commenterImage">
                                                            <img src="http://placekitten.com/40/40" />
                                                        </div>
                                                        <div class="commentText">
                                                            <p class="">Hello this is a test comment.</p> <span
                                                                class="date sub-text">on March 5th, 2014</span>

                                                        </div>
                                                    </li>  --}}

                                                </ul>
                                                <form class="form-inline" role="form" id="verify_form"
                                                    name="verify_form">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" name="comment"
                                                            id="comment_{{ $value1['id'] }}" placeholder="Your comments"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger btn_add" type="button"
                                                            id="{{ $value1['id'] }}">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{--  <div class="panel-body text-right">
                                        <button type="button" class="btn btn-xs btn-warning" id="comment_btn"
                                            name="comment_btn">Comment</button>
                                    </div>  --}}



                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
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



    {{-- END SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });



        });
        var add_comment="{{ url('add_comment') }}";
        var get_comment="{{ url('get_comment') }}";
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

    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/notification.js') }}">
    </script>

    <script type='text/javascript'>
        $(document).ready(function() {
             $(document).on("change", "#date", function(e) {
        e.preventDefault();

        var date=$("#date").val();
          var group_id=$("#group_id").val();

            {{--  $.ajax({
            data: {
                date:date,
                group_id:group_id,
            },
            url: "{{ url('get_datewise_notifications') }}",
            type: "POST",
            dataType: 'json',
            success: function(data) {
location.href=data;
            }
        });  --}}


             });
        });
    </script>
</body>

</html>

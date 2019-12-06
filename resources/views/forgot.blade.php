@include('layouts.header')

<body>
    <!-- START LOGIN-->
    <div class="login">
        <!-- message box -->
        <div class="message-box message-box-info animated fadeIn" id="message-box-info">
            <!-- LOGIN WIDGET -->
            <div class="row popup-container">
                <div id="infoMessage"></div>
                <div
                    class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-4 popup-container-inner">
                    <div class="panel panel-default">
                        <input type="hidden" id="save_update" value="">
                        <form id="send_form" name="send_form" class="form-signin">
                            <div class="panel-body" id="first">
                                <h2>Forgot Password</h2>

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="" id="email" placeholder="Email Address"
                                        class="form-control" required />
                                    <div class='validation2' style='color:red;margin-bottom: 20px;'></div>
                                </div>

                                <div class="form-group">
                                    <a href="{{ url('/') }}"><b>Log In</b></a>
                                    <div class="col-md-4 pull-right">

                                        <input type="submit" name="Send" value="Send OTP" id="send"
                                            class="btn btn-info btn-block" />

                                    </div>


                                </div>
                            </div>
                        </form>
                        <form id="verify_form" name="verify_form" class="form-signin">
                            <div class="panel-body" id="second" style="display:none;">
                                <h2>OTP Verification</h2>


                                <div class="form-group">
                                    <label>Verify OTP*</label>
                                    <input type="text" name="otp" value="" id="otp" placeholder="Verify OTP"
                                        class="form-control" />
                                </div>
                                <div class="timer-container countdown" id="#run-the-timer" style="color: red;">
                                    <span class="minute">01</span>:<span class="second">00</span>

                                </div>
                                <span class="timeout_message_show" style="display:none; color: red;">We are
                                    Sorry, Your time is up ! Please Click on Resend Button</span><br />
                                <span class="wrong_otp" style="display:none; color: red;">You Entered OTP is Wrong
                                    Please
                                    Try Again!</span>

                                <div class="form-group">
                                    <input type="hidden" name="hidden_id2" id="hidden_id2" value="">
                                    <div class="col-md-4 pull-right">

                                        <input type="submit" name="add" value="Verify" id="add"
                                            class="btn btn-info btn-block" />

                                    </div>
                                    <div class="col-md-4 pull-left">


                                        <button type="button" class="btn btn-info  " id="resend"
                                            style="margin-top:5px; margin-right: 5px">Resend</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                        <form id="signupform" name="signupform" class="form-signin">

                            <div class="panel-body" id="third" style="display:none">
                                <h2>Set Your Password</h2>



                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" value="" id="password" placeholder="Password"
                                        class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="c_password" value="" id="c_password"
                                        placeholder="Confirm Password" class="form-control" required />
                                    <div class='validation' style='color:red;margin-bottom: 20px;'>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-6 pull-right">

                                        <input type="submit" name="Register" value="Change Password"
                                            class="btn btn-info btn-block" />

                                    </div>


                                </div>
                            </div>
                        </form>
                        <div class="panel-body" id="fourth" style="display:none">
                            <h2>Password Changed Successfully</h2>

                            <a href="{{ url('/') }}"><b>Log In Now</b></a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN WIDGET -->
    </div>
    <!--END LOGIN-->
    <!-- MESSAGE BOX-->

    @include('layouts.message_box')
    <!-- END MESSAGE BOX-->

    <!-- START SCRIPTS -->
    @include('layouts.footer_scripts')

    <!-- END SCRIPTS -->
    <script type="text/javascript">
        $(document).ready(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });


        });
        var change_password="{{ url('change_password') }}";
        var redirect="{{ url('/') }}";

    </script>
    <script type='text/javascript' src="{{ URL::asset('/resources/js/myjs/forgot.js',true) }}">
    </script>


</body>

</html>

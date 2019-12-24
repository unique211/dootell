$(document).ready(function() {
    var mobile = 0;
    var random;

    var email_id;
    $(':input[type="submit"]').prop('disabled', true);
    $(document).on('blur', "#email", function(e) {
        e.preventDefault();

        var email = $("#email").val();



        $(".validation2").html('');
        $(':input[type="submit"]').prop('disabled', false);
        if (email != "") {
            $.get('get_email/' + email, function(data) {

                if (data == 0 || data == "0") {

                    $(".validation2").html("This Email Address is Not Exists,Please SignUp");
                    $(':input[type="submit"]').prop('disabled', true);
                } else {

                    $(".validation2").html(''); // remove it
                    $(':input[type="submit"]').prop('disabled', false);

                    email_id = email;
                    get_mobile(email);
                }
            });

        }

    });

    function get_mobile(email) {
        $(':input[type="submit"]').prop('disabled', false);

        $.ajax({

            url: 'get_mobile_number/' + email,
            type: "GET",
            async: false,
            success: function(data) {

                if (data == "") {
                    swal("Not Found Mobile Number", "Hey, Your Mobile Number is Not Registed with us !!", "error");
                    $(':input[type="submit"]').prop('disabled', true);
                } else {
                    mobile = data;
                    $(':input[type="submit"]').prop('disabled', false);
                }
            }
        });



    }


    $(document).on("submit", "#send_form", function(e) {
        e.preventDefault();

        $('#first').hide();
        $('#second').show();
        $('#third').hide();
        $('#fourth').hide();
        $('.wrong_otp').hide();
        $('#add').attr('disabled', false);
        $('#resend').attr('disabled', true);
        Timer();
        //   var mobile = $("#mobile").val();


        random = Math.floor(100000 + Math.random() * 900000);
        var api = "https://2factor.in/API/V1/f90a1df2-9bcc-11e9-ade6-0200cd936042/SMS/" + mobile + "/" + random + "/OTP";
        $.ajax({
            async: true,
            crossDomain: true,
            url: api,
            method: "GET",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            },
            data: {},
            success: function(data) {
                console.log(data);
                successTost("OTP Sent Your Registered Mobile Number");
            }
        });


    });
    $(document).on("click", "#resend", function(e) {
        e.preventDefault();
        $('.wrong_otp').hide();
        $('#add').attr('disabled', false);
        $('#resend').attr('disabled', true);
        Timer();
        // var mobile = $("#mobile").val();

        random = Math.floor(100000 + Math.random() * 900000);
        var api = "https://2factor.in/API/V1/f90a1df2-9bcc-11e9-ade6-0200cd936042/SMS/" + mobile + "/" + random + "/OTP";
        $.ajax({
            async: true,
            crossDomain: true,
            url: api,
            method: "GET",
            headers: {
                "content-type": "application/x-www-form-urlencoded"
            },
            data: {},
            success: function(data) {
                console.log(data);
                successTost("OTP Resend Your Registered Mobile Number");
            }
        });

    });
    $(document).on("submit", "#verify_form", function(e) {
        e.preventDefault();
        var v_otp = $('#otp').val();
        if (v_otp == random) {
            $('#second').hide();
            $('#third').show();
            $('#first').hide();
            $('#fourth').hide();
            $('.wrong_otp').hide();
        } else {
            $('.wrong_otp').show();
        }
    });
    $(document).on("submit", "#signupform", function(e) {
        e.preventDefault();

        var password = $('#password').val();
        var c_password = $('#c_password').val();

        if (c_password == password) {
            $(".validation").html('');

            $.ajax({
                data: {
                    password: password,
                    email: email_id,
                },
                url: change_password,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    successTost("Password Changed");
                    location.href = redirect;
                    //  location.href = baseurl + "Welcome/dashboard";


                },
                error: function(data) {
                    console.log('Error:', data);

                }
            });

        } else {
            $(".validation").html("Please Enter Same Password");
            $("#c_password").focus();
        }

    });

    function Timer() {
        //  $("span.minute").val(01);
        //  $("span.second").val(00);
        var fragmentTime;
        $('.timeout_message_show').hide();
        var minutes = 02;
        var seconds = 00;
        //var minutes = $("span.minute").html();
        // var seconds = $("span.second").html();
        minutes = parseInt(minutes);
        seconds = parseInt(seconds);
        if (isNaN(minutes)) {
            minutes = 00;
        }
        if (isNaN(seconds)) {
            seconds = 00;
        }
        if (minutes == 60) {
            minutes = 59;
        }
        if (seconds == 60) {
            seconds = 59;
        }
        fragmentTime = (60 * minutes) + (seconds);
        displayMinute = document.querySelector('span.minute');
        displaySecond = document.querySelector('span.second');
        startTimer(fragmentTime, displayMinute, displaySecond);
    }

    function startTimer(duration, displayMinute, displaySecond) {
        var timer = duration,
            displayMinute, displaySecond;
        var timeIntervalID = setInterval(function() {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            displayMinute.textContent = minutes;
            displaySecond.textContent = seconds;
            if (--timer < 0) {
                timer = 0;
                if (timer == 0) {
                    clearInterval(timeIntervalID);
                    $('.timeout_message_show').show();
                    $('#add').attr('disabled', true);
                    $('#resend').attr('disabled', false);
                }
            }
        }, 1000);
    }
});
$(document).ready(function() {
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
    /*---------login-----------------*/
    $(document).on("submit", "#loginform", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        var password = $('#password').val();
        // alert('submit');
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
            data: $('#loginform').serialize(),
            url: login,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $(':input[type="submit"]').prop('disabled', false);
                if (data == 1 || data == "1") {
                    successTost("Login Successfully");
                    location.href = redirect;
                    //  location.href = baseurl + "Welcome/dashboard";
                } else if (data == 2 || data == "2") {
                    swal({
                            title: "Account Expired",
                            text: "Your Account is Expired. Please, Re-new it !!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Re-new it !!",
                            closeOnConfirm: false
                        },
                        function() {
                            $.get('get_user_details/' + user_id, function(data) {
                                // alert(data.role + '--' + data.ref_id);
                                if (data.role == "Consultancy") {
                                    location.href = consultancy_package;
                                } else if (data.role == "Company") {
                                    location.href = company_package;
                                } else {
                                    location.href = jobseeker_package;
                                }
                            });

                            // location.href = company;
                            return false;
                        });
                    //    swal("Account Expired", "Hey, Your Account is Expired Please Contact Admin !!", "error");

                }
                // else if (data == 2 || data == "2") {
                //     swal("Account Expired", "Hey, Your Account is Expired Please Contact Admin !!", "error");
                // } else if (data == 3 || data == "3") {
                //     swal("Account Deactivated", "Hey, Your Account is Not Activate Please Contact Admin !!", "error");
                // }
                else {
                    errorTost("Invalide Login Detail");
                }

            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
    });
    /*---------login-----------------*/

    $(document).on('blur', "#email", function(e) {
        e.preventDefault();

        var email = $("#email").val();
        $("#btn_submit").attr("disabled", false);
        $('#chkemail').hide();
        if (email != "") {
            $.get('get_email/' + email, function(data) {
                //    alert(data);
                if (data == 0 || data == "0") {

                    $.get('get_email_member/' + email, function(data) {
                        if (data == 0 || data == "0") {
                            $('#chkemail').show();
                            $("#btn_submit").attr("disabled", true);
                            $("#email").val('');
                        } else {
                            $('#chkemail').hide();
                            $("#btn_submit").attr("disabled", false);
                        }
                    });



                } else {
                    $('#chkemail').hide();
                    $("#btn_submit").attr("disabled", false);
                }
            });

        }

    });
    $("#success").html('');
    $(document).on("submit", "#mail_form", function(e) {
        e.preventDefault();
        //   var email = $('#email').val();
        $("#btn_submit").attr("disabled", true);
        $("#success").html('Please Wait...');
        $.ajax({
            data: $('#mail_form').serialize(),
            url: forget,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                //  alert(data);
                $("#success").html(data);

            },
            error: function(data) {
                console.log('Error:', data);
                $("#btn_submit").attr("disabled", false);
            }
        });
    });
});

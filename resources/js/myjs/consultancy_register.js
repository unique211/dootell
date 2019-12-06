$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#date').val('');
        $('#cunsultancy_name').val('');
        $('#email').val('');
        $('#mobile').val('');
        $('#cunsultancy_address').val('');
        $('#filehidden1').val('');
        $('#city').val('');
        $('#password').val('');
        $('#c_password').val('');
        $('#filehidden1').val('');
        $('#reference').val('');
        $("#t_and_c").attr("checked", false);
        $('#password').prop('required', true);
        $('#c_password').prop('required', true);
        $("#submit_btn").hide();
    }

    $(document).on('change', "#t_and_c", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $("#t_and_c").val(1);
            $("#submit_btn").show();

        } else {
            $("#t_and_c").val(0);
            $("#submit_btn").hide();
        }

    });
    $(document).on('blur', "#c_password", function(e) {
        e.preventDefault();
        var password = $("#password").val();
        var cpassword = $('#c_password').val();
        $("#submit_btn").attr("disabled", false);
        if (password != "" && cpassword != "") {
            if (password != cpassword) {
                // swal("Password not match", "Hey, please enter password and confirm password same !!", "error");
                $("#submit_btn").attr("disabled", true);
                $('#conformpass').show();
                $("#c_password").val('');
            } else {
                $("#submit_btn").attr("disabled", false);
                $('#conformpass').hide();

            }
        }
    });

    $(document).on('blur', "#email", function(e) {
        e.preventDefault();

        var email = $("#email").val();
        // alert(email);
        $("#submit_btn").attr("disabled", false);
        $('#chkemail').hide();
        if (email != "") {
            $.get('../get_email/' + email, function(data) {

                if (data == 0 || data == "0") {
                    $('#chkemail').hide();
                    $("#submit_btn").attr("disabled", false);
                } else {
                    $('#chkemail').show();
                    $("#submit_btn").attr("disabled", true);
                    $("#email").val('');
                }
            });

        }

    });

    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();
        //   alert("in submit");
        $(':input[type="submit"]').prop('disabled', true);
        var id = $("#save_update").val();

        if (id == "") {

            $("#myModal").modal('show');

            $('.wrong_otp').hide();
            $('#add').attr('disabled', false);
            $('#resend').attr('disabled', true);
            Timer();
            var mobile = $("#mobile").val();
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
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        } else {
            $.ajax({
                data: $('#master_form').serialize(),
                url: add_data,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    // $("#master_form").trigger('reset');

                    $(".closehideshow").trigger('click');
                    form_clear();
                    successTost("Saved Successfully");
                    $('#save_update').val('');

                    datashow();
                    $(':input[type="submit"]').prop('disabled', false);
                    //  $("#if_c").hide();

                },
                error: function(data) {
                    console.log('Error:', data);
                    //  $('#btn-save').html('Save Changes');
                }
            });
        }




    });
    datashow();

    function datashow() {
        var sub_menu = "Consultancy_List";
        var rights = 1;

        if (role == "Admin" || role == "Employee" || role == "Group_Admin" || role == "Superadmin") {
            $(".btnhideshow").show();
            $.ajax({
                type: "POST",
                url: 'get_current_rights/' + sub_menu,
                dataType: "JSON",
                async: false,
                success: function(data) {

                    if (data == 0 || data == "0") {
                        $(".btnhideshow").hide();
                        rights = 0;
                    } else {
                        $(".btnhideshow").show();
                        rights = 1;
                    }
                }
            });

        } else {
            rights = 1;
        }


        $.get('get_all_consultancy_lists', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Cunsultancy Name</font></th>' +
                '<th><font style="font-weight:bold">Registration Date</font></th>' +
                // '<th><font style="font-weight:bold">Last Date</font></th>' +
                '<th><font style="font-weight:bold">Email</font></th>' +
                '<th><font style="font-weight:bold">Mobile No.</font></th>' +
                '<th><font style="font-weight:bold">Address</font></th>' +
                '<th><font style="font-weight:bold">City</font></th>' +
                // '<th><font style="font-weight:bold">Status</font></th>' +
                // '<th><font style="font-weight:bold">Amount</font></th>' +
                // '<th><font style="font-weight:bold">Payment Status</font></th>' +
                '<th><font style="font-weight:bold">Reference</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Last Date</font></th>';
            if (role == "Consultancy") {
                html += '<th class="not-export-column"><font style="font-weight:bold">Update Profile</font>   </th>';
            } else {
                if (rights == 1) {
                    html += '<th class="not-export-column"><font style="font-weight:bold">Update Profile</font>   </th>';
                }

            }

            html += '</tr>';
            '</thead>' +
            '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].date;
                var fdateslt = date.split('-');
                var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                // var image1 = "";
                // var image = data[i].upload_image;
                // if (image == null) {
                //     image1 = "";
                // } else {
                //     image1 = '<img src = "uploads/consultancy/' + data[i].upload_image + '" class="img - thumbnail" style="width: 100px; height: 100px;" />';
                // }
                var date2 = "";
                if (data[i].expire_date == null) {
                    date2 = "";
                } else {
                    var date = data[i].expire_date;
                    var fdateslt = date.split('-');
                    date2 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                }

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/consultancy/' + data[i].upload_image + '" class="img - thumbnail" style="width: 100px; height: 100px;" /></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].cunsultancy_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + date1 + '</td>' +
                    // '<td id="cus_name_' + data[i].id + '"></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].email + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].mobile + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].cunsultancy_address + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].city + '</td>' +
                    // '<td id="cus_name_' + data[i].id + '"></td>' +
                    // '<td id="cus_name_' + data[i].id + '"></td>' +
                    // '<td id="cus_name_' + data[i].id + '"></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].reference + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].package_price + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + date2 + '</td>';

                if (role == "Consultancy") {
                    html += '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
                        data[i].id +
                        '><i class="fa fa-edit"></i></button></td>';
                } else {
                    if (rights == 1) {
                        html += '<td class="not-export-column" ><button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                            data[i].id + '><i class="fa fa-trash"></i></button></td>';
                    }

                }
                html += '</tr>';



            }
            html += '</tbody></table>';
            $('#show_master').html(html);
            if (role == "Superadmin" || role == "Admin" || role == "Employee") {
                $('#laravel_crud').DataTable({
                    pageLength: 50,
                    dom: 'Bfrtip',

                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Consultancy List',
                            exportOptions: {
                                columns: [0, 1, 2, 4, 5, 6, 7, 11]
                            },

                        },
                        {
                            extend: 'print',
                            title: 'Consultancy List',
                            exportOptions: {
                                columns: [0, 1, 2, 4, 5, 6, 7, 11]
                            },


                        }
                    ]
                });
            }

        })

    }
    $(document).on('click', ".edit_data", function(e) {
        e.preventDefault();
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        var id = $(this).attr("id");
        // alert(id);
        $.get('consultancy/' + id + '/edit', function(data) {
            //  alert(id);
            $('#save_update').val(id);
            var date = data.date;
            var fdateslt = date.split('-');
            var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
            $('#date').val(date1);
            $('#cunsultancy_name').val(data.cunsultancy_name);
            $('#package_id').val(data.package_id);
            $('#email').val(data.email);
            $('#mobile').val(data.mobile);
            $('#cunsultancy_address').val(data.cunsultancy_address);
            $('#city').val(data.city);
            $('#reference').val(data.reference);
            $('#filehidden1').val(data.upload_image);
            $("#t_and_c").attr("checked", true).trigger('change');
            $('#password').removeAttr('required');
            $('#c_password').removeAttr('required');

        });
    });
    $(document).on('click', '.delete_data', function() {
        var id1 = $(this).attr('id');
        var user_id = $("#user_id_").html();
        if (id1 != "") {
            swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this Data !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    closeOnConfirm: false
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: delete_data + '/' + id1,
                        success: function(data) {

                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                // $('.closehideshow').trigger('click');
                                $('#save_update').val("");
                                datashow(); //call function show all data
                            } else {
                                errorTost("Data Delete Failed");
                            }

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });


                    return false;
                });
        }
    });
    $(document).on('click', "#reset", function(e) {
        e.preventDefault();
        form_clear();
    });
    $(document).on('click', ".closehideshow", function(e) {
        e.preventDefault();
        form_clear();
        datashow();
    });

    $(document).on("click", "#resend", function(e) {
        e.preventDefault();
        $('.wrong_otp').hide();
        $('#add').attr('disabled', false);
        $('#resend').attr('disabled', true);
        Timer();
        var mobile = $("#mobile").val();
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

            }
        });

    });
    $(document).on("submit", "#verify_form", function(e) {
        e.preventDefault();
        var v_otp = $('#otp').val();
        if (v_otp == random) {

            $('.wrong_otp').hide();
            $.ajax({
                data: $('#master_form').serialize(),
                url: add_data,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    // $("#master_form").trigger('reset');
                    var id = "";
                    $('#otp').val('');
                    $("#close_model").trigger('click');

                    $(".closehideshow").trigger('click');
                    form_clear();
                    successTost("Saved Successfully");
                    $('#save_update').val('');

                    datashow();
                    id = data;
                    $("#return_id").val(id);
                    //   alert(id);

                    $('#hidden_form').submit();
                    //  $("#if_c").hide();

                },
                error: function(data) {
                    console.log('Error:', data);
                    //  $('#btn-save').html('Save Changes');
                }
            });
        } else {
            $('.wrong_otp').show();
        }
    });

    function Timer() {
        //  $("span.minute").val(01);
        //  $("span.second").val(00);
        var fragmentTime;
        $('.timeout_message_show').hide();
        var minutes = 01;
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

    $(document).on('click', '#pay_now', function(e) {
        $('#hidden_form').submit();
    });

});
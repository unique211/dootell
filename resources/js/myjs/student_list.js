$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#date').val('');
        $('#date').val('');
        $('#full_name').val('');
        $('#email').val('');
        $('#mobile').val('');
        $('#education').val('');
        $('#course').val('');
        $('#specialization').val('');
        $('#skill').val('');
        $('#board').val('');
        $('#institution').val('');
        $('#passing_year').val('');
        $('#marks').val('');
        $('#experience').val('');
        $('#dob').val('');
        $('#address').val('');
        $('#hometown').val('');
        $('#pin').val('');
        $('#state').val('');
        $('#pan').val('');
        $('#aadhar').val('');
        $('#reference').val('');
        $('#filehidden1').val('');
        $('#filehidden2').val('');
        $('#package_id').val('');
        $("#t_and_c").attr("checked", false);
        // $("#submit_btn").hide();
        $("#file_info_tbody").html('');
        $("#submit_btn").attr("disabled", false);
        $("#male").attr("checked", false);
        $("#female").attr("checked", false);
    }

    // $(document).on('change', "#t_and_c", function(e) {
    //     e.preventDefault();
    //     if ($(this).is(":checked")) {
    //         $("#t_and_c").val(1);
    //         $("#submit_btn").show();

    //     } else {
    //         $("#t_and_c").val(0);
    //         $("#submit_btn").hide();
    //     }

    // });
    $(document).on('change', "#experience", function(e) {
        e.preventDefault();
        var experience = $("#experience").val();
        if (experience == "Experience") {
            $("#if_exp").show();
        } else {
            $("#if_exp").hide();
            $("#file_info_tbody").html('');
        }


    });
    // $(document).on('blur', "#c_password", function(e) {
    //     e.preventDefault();
    //     var password = $("#password").val();
    //     var cpassword = $('#c_password').val();
    //     $("#submit_btn").attr("disabled", false);
    //     if (password != "" && cpassword != "") {
    //         if (password != cpassword) {
    //             // swal("Password not match", "Hey, please enter password and confirm password same !!", "error");
    //             $("#submit_btn").attr("disabled", true);
    //             $('#conformpass').show();
    //             $("#c_password").val('');
    //         } else {
    //             $("#submit_btn").attr("disabled", false);
    //             $('#conformpass').hide();

    //         }
    //     }
    // });

    // $(document).on('blur', "#email", function(e) {
    //     e.preventDefault();

    //     var email = $("#email").val();
    //     // alert(email);
    //     $("#submit_btn").attr("disabled", false);
    //     $('#chkemail').hide();
    //     if (email != "") {
    //         $.get('../get_email/' + email, function(data) {

    //             if (data == 0 || data == "0") {
    //                 $('#chkemail').hide();
    //                 $("#submit_btn").attr("disabled", false);
    //             } else {
    //                 $('#chkemail').show();
    //                 $("#submit_btn").attr("disabled", true);
    //                 $("#email").val('');
    //             }
    //         });

    //     }

    // });

    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();
        //   alert("in submit");
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({
            data: $('#master_form').serialize(),
            url: add_data,
            type: "POST",
            dataType: 'json',
            success: function(data) {

                var experience = $("#experience").val();
                if (experience == "Experience") {
                    if ($('#file_info_tbody').html() != "") {
                        var id = $("#save_update").val();
                        var ref_id = "";
                        if (id == "") {
                            ref_id = data;
                        } else {
                            ref_id = id;
                        }

                        //    $("#save_update").val();
                        // ref_id = data;
                        var r1 = $('table#file_info').find('tbody').find('tr');
                        var r = r1.length;
                        for (var i = 0; i < r; i++) {
                            var company_name = $(r1[i]).find('td:eq(0)').html();
                            var years = $(r1[i]).find('td:eq(1)').html();
                            var months = $(r1[i]).find('td:eq(2)').html();
                            //  alert(ref_id);
                            $.ajax({
                                // data: $('#master_form').serialize(),
                                data: {
                                    ref_id: ref_id,

                                    company_name: company_name,
                                    years: years,
                                    months: months,
                                },
                                url: add_experience,
                                type: "POST",
                                dataType: 'json',
                                success: function(data) {
                                    // $("#master_form").trigger('reset');
                                    $("#file_info_tbody").html('');

                                    //   $(".closehideshow").trigger('click');
                                    //  form_clear();
                                    successTost("Saved Successfully");
                                    $(':input[type="submit"]').prop('disabled', false);
                                    $('#save_update').val('');
                                    //  datashow();
                                    // location.href="{{ route('invoice.index')}}";
                                }
                            });
                        }
                    } else {
                        swal("Empty Data !!", "Hey, your Data has been empty !!", "error");
                    }

                } else {
                    // $("#master_form").trigger('reset');

                    $(".closehideshow").trigger('click');
                    form_clear();
                    successTost("Saved Successfully");
                    $('#save_update').val('');
                    $(':input[type="submit"]').prop('disabled', false);
                    datashow();
                    //  $("#if_c").hide();

                }




            },
            error: function(data) {
                console.log('Error:', data);
                //  $('#btn-save').html('Save Changes');
            }
        });


    });
    datashow();

    function datashow() {
        $.get('get_all_student_lists', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Full Name</font></th>' +
                '<th><font style="font-weight:bold">Registration Date</font></th>' +
                '<th><font style="font-weight:bold">Last Date</font></th>' +

                '<th><font style="font-weight:bold">Email</font></th>' +
                '<th><font style="font-weight:bold">Mobile No.</font></th>' +
                '<th><font style="font-weight:bold">Education</font></th>' +
                '<th><font style="font-weight:bold">Course</font></th>' +
                '<th><font style="font-weight:bold">Status</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Payment Status</font></th>' +

                '<th class="not-export-column"><font style="font-weight:bold">Operation</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].date;
                var fdateslt = date.split('-');
                var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].full_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + date1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].email + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].mobile + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].education + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].course + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"></td>' +
                    '<td id="cus_name_' + data[i].id + '"></td>' +
                    '<td id="cus_name_' + data[i].id + '"></td>';

                if (role == "Consultancy") {
                    html += '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
                        data[i].id +
                        '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                        data[i].id + '><i class="fa fa-trash"></i></button></td>';
                } else {
                    html += '<td class="not-export-column" ><button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                        data[i].id + '><i class="fa fa-trash"></i></button></td>';
                }
                html += '</tr>';


            }
            html += '</tbody></table>';
            $('#show_master').html(html);
            $('#laravel_crud').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Students List',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5, 6, 7]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Students List',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5, 6, 7]
                        },
                    }
                ]
            });
        })

        $.get('get_consultancy_student_limit', function(data) {
            if (data == 2 || data == "2") {
                swal("Limit Over !!", "Hey, Your Create Student Limit is Over !!", "warning");
                $('.btnhideshow').hide();
            } else {
                $('.btnhideshow').show();
            }
        });
    }
    $(document).on('click', ".edit_data", function(e) {
        e.preventDefault();
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        var id = $(this).attr("id");
        // alert(id);
        $.get('consultancy_student/' + id + '/edit', function(data) {
            //  alert(id);
            $('#save_update').val(id);
            var date = data.date;
            var fdateslt = date.split('-');
            var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
            var dob = data.dob;
            var fdateslt = dob.split('-');
            var dob1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
            var gender = data.gender;
            if (gender == "Male") {
                $("#male").prop("checked", true);
            } else {
                $("#female").prop("checked", true);
            }
            $('#date').val(date1);
            $('#full_name').val(data.full_name);
            $('#email').val(data.email);
            $('#mobile').val(data.mobile);
            $('#education').val(data.education);
            $('#course').val(data.course);
            $('#specialization').val(data.specialization);
            $('#skill').val(data.skill);
            $('#board').val(data.board);
            $('#institution').val(data.institution);
            $('#passing_year').val(data.passing_year);
            $('#marks').val(data.marks);
            $('#experience').val(data.experience).trigger('change');
            $('#dob').val(dob1);
            $('#address').val(data.address);
            $('#hometown').val(data.hometown);
            $('#pin').val(data.pincode);
            $('#state').val(data.state);
            $('#pan').val(data.pan);
            $('#int_job_location').val(data.int_job_location);
            $('#aadhar').val(data.aadhar);
            $('#reference').val(data.reference);
            $('#filehidden1').val(data.profile_photo);
            $('#filehidden2').val(data.resume_doc);
            $('#package_id').val(data.package_id);
            $('#password').removeAttr('required');
            $('#c_password').removeAttr('required');
            $("#t_and_c").attr("checked", true).trigger('change');

            $.get('jobseeker_exp/' + id, function(data) {
                var data = eval(data);
                var r = data.length;
                //  alert(r);
                var row_id = $("#row").val();
                var table = "";
                for (var i = 0; i < r; i++) {
                    row_id = parseInt(row_id) + 1;
                    table += '<tr id="' + row_id + '">' +
                        '<td  id="company_name_' + row_id + '">' + data[i].company_name + '</td>' +
                        '<td  id="years_' + row_id + '">' + data[i].years + '</td>' +
                        '<td  id="months_' + row_id + '">' + data[i].months + '</td>' +
                        '<td><button type="button" name="edit" class="edit_data1 btn btn-success" id="' + row_id + '">Edit</button>' +
                        ' <button type="button" name="delete" id="' + row_id + '" value="Delete" class="btn delete_data1 btn-danger">Delete</button></td></tr>';



                    $('#row').val(row_id);
                    // alert(table);
                }
                $('#file_info_tbody').html(table);

            })

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
                                $('.closehideshow').trigger('click');
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
    $(document).on('click', '#plus', function(e) {
        e.preventDefault();
        var rowid = $('#row').val();
        var row_id = parseInt(rowid) + 1;

        var company_name = $("#company_name").val();
        var years = $("#years").val();
        var months = $("#months").val();
        var id = $("#ids").val();
        if (id != "") {

            $("#company_name_" + id).html(company_name);
            $("#years_" + id).html(years);
            $("#months_" + id).html(months);
        } else {
            //   alert(row_id);
            //$('#file_info_tbody').html('');
            var table = "";
            table = '<tr id="' + row_id + '">' +
                '<td id="company_name_' + row_id + '">' + company_name + '</td>' +
                '<td id="years_' + row_id + '">' + years + '</td>' +
                '<td  id="months_' + row_id + '">' + months + '</td>' +
                '<td>' +
                '<button type="button" name="edit" class="edit_data1 btn btn-success" id="' + row_id + '">Edit</button>' +
                ' <button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger">Delete</button></td></tr>';
            $('#file_info_tbody').append(table);
            $('#row').val(row_id);
            $('#ids').val('');
        }
        $("#company_name").val('');
        $("#years").val('');
        $("#months").val('');

        $('#ids').val('');

    });
    $(document).on('click', '.delete_data1', function() {
        if (confirm("Are you sure you want to delete this?")) {
            $(this).parents("tr").remove();

        } else {
            return false;
        }

    });
    $(document).on('click', '.edit_data1', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');
        $("#ids").val(id1);
        $('#company_name').val($('#company_name_' + id1).text());
        $('#years').val($('#years_' + id1).text());
        $('#months').val($('#months_' + id1).text());

    });

});
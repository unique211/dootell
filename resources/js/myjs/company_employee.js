$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#full_name').val('');
        $('#education').val('');
        $('#designation').val('');
        $('#experience').val('');
        $('#date').val('');
        $('#leave_date').val('');
        $('#experience_certificate').val('');
        $('#notice_period').val('');
        $('#notice_months').val('');
        $('#reason').val('');
        $('#aadhar').val('');
        $('#behaviour').val('');
        $('#attendence').val('');
        $('#sincerity').val('');
        $('#dependability').val('');
        $('#filehidden1').val('');
        $("#if_yes").hide();
        $("#male").attr("checked", false);
        $("#female").attr("checked", false);
    }

    $(document).on('change', "#notice_period", function(e) {
        e.preventDefault();
        $("#if_yes").hide();
        var notice_period = $("#notice_period").val();

        if (notice_period == "Yes") {
            $("#if_yes").show();

        } else {
            $("#if_yes").hide();

        }

    });
    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();
        // alert("in submit");
        $(':input[type="submit"]').prop('disabled', true);
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
                $("#if_yes").hide();
                $(':input[type="submit"]').prop('disabled', false);
            },
            error: function(data) {
                console.log('Error:', data);
                //  $('#btn-save').html('Save Changes');
            }
        });


    });
    datashow();

    function datashow() {

        $.get('get_all_company_employee', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Full Name</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Gender</font></th>' +
                '<th><font style="font-weight:bold">Education</font></th>' +
                '<th><font style="font-weight:bold">Designation</font></th>' +
                '<th><font style="font-weight:bold">Experience</font></th>' +
                '<th><font style="font-weight:bold">Aadhar Number</font></th>' +
                '<th><font style="font-weight:bold">Joining Date</font></th>' +
                '<th><font style="font-weight:bold">Leaving Date</font></th>' +
                '<th><font style="font-weight:bold">Notice Period</font></th>' +
                '<th><font style="font-weight:bold">Any Legel Affence</font></th>' +
                '<th><font style="font-weight:bold">Behaviour</font></th>' +
                '<th><font style="font-weight:bold">Attendence</font></th>' +
                '<th><font style="font-weight:bold">Sincerity</font></th>' +
                '<th><font style="font-weight:bold">Dependability</font></th>' +
                '<th><font style="font-weight:bold">Share to All</font></th>' +
                '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var status_id = data[i].status;
                var status = "";
                var button = "";
                var image = "";
                if (data[i].profile_picture == null) {
                    image = "";
                } else {
                    image = '<img src = "uploads/Company/employee/' + data[i].profile_picture + '" class="img - thumbnail" style="width: 100px; height: 100px;" />';
                }

                var date = data[i].doj;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var leave_date = data[i].leave_date;
                var fdateslt = leave_date.split('-');
                var leave_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                if (status_id == 0 || status_id == "0") {
                    status = "Disabled";
                    button = '<button name="edit" value="edit" class="enable_btn btn btn-xs btn-success" id=' + data[i].id + '>Enable</button>';
                } else {
                    status = "Enabled";
                    button = '<button name="edit" value="edit" class="disable_btn btn btn-xs btn-danger" id=' + data[i].id + '>Disable</button>';
                }
                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].full_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + image + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].gender + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].education + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].designation + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].experience + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + leave_date1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].notice_period + '</td>' +
                    '<td id="cus_name_' + data[i].id + '" >' + data[i].reason + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].behaviour + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].attendence + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].sincetity + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].dependability + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + status + '</td>' +
                    '<td class="not-export-column" >' + button + '&nbsp;<button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
                    data[i].id +
                    '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                    data[i].id + '><i class="fa fa-trash"></i></button></td>' + '</tr>';
            }
            html += '</tbody></table>';
            $('#show_master').html(html);
            $('#laravel_crud').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',

                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Company Employee',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5, 6, 7, 8, 9, 10]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Company Employee',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5, 6, 7, 8, 9, 10]
                        },


                    }
                ]
            });
        })

        $.get('get_all_company_employee2', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud2" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Full Name</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Gender</font></th>' +
                '<th><font style="font-weight:bold">Education</font></th>' +
                '<th><font style="font-weight:bold">Designation</font></th>' +
                '<th><font style="font-weight:bold">Experience</font></th>' +
                '<th><font style="font-weight:bold">Aadhar Number</font></th>' +
                '<th><font style="font-weight:bold">Joining Date</font></th>' +
                '<th><font style="font-weight:bold">Leaving Date</font></th>' +
                '<th><font style="font-weight:bold">Notice Period</font></th>' +
                '<th><font style="font-weight:bold">Any Legel Affence</font></th>' +
                '<th><font style="font-weight:bold">Behaviour</font></th>' +
                '<th><font style="font-weight:bold">Attendence</font></th>' +
                '<th><font style="font-weight:bold">Sincerity</font></th>' +
                '<th><font style="font-weight:bold">Dependability</font></th>' +
                '<th><font style="font-weight:bold">Company Name</font></th>' +
                '<th><font style="font-weight:bold">Contact Number</font></th>' +
                '<th><font style="font-weight:bold">Email</font></th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var status_id = data[i].status;

                var date = data[i].doj;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var leave_date = data[i].leave_date;
                var fdateslt = leave_date.split('-');
                var leave_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                var image = "";
                if (data[i].profile_picture == null) {
                    image = "";
                } else {
                    image = '<img src = "uploads/Company/employee/' + data[i].profile_picture + '" class="img - thumbnail" style="width: 100px; height: 100px;" />';
                }

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].full_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + image + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].gender + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].education + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].designation + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].experience + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + leave_date1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].notice_period + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].reason + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].behaviour + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].attendence + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].sincetity + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].dependability + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].company_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].mobile + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].email + '</td>' +
                    '</tr>';
            }
            html += '</tbody></table>';
            $('#show_master2').html(html);
            $('#laravel_crud2').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',

                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Other Company Employee',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5, 6, 7, 8, 9]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Other Company Employee',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5, 6, 7, 8, 9]
                        },


                    }
                ]
            });
        })
        $.get('get_company_employee_limit', function(data) {
            if (data == 2 || data == "2") {
                swal("Limit Over !!", "Hey, Your Create Employee Limit is Over !!", "warning");
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
        $.get('company_employee/' + id + '/edit', function(data) {
            //  alert(id);

            var date = data.doj;
            var fdateslt = date.split('-');
            var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
            var leave_date = data.leave_date;
            var fdateslt = leave_date.split('-');
            var leave_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
            var gender = data.gender;
            if (gender == "Male") {
                $("#male").prop("checked", true);
            } else {
                $("#female").prop("checked", true);
            }
            $('#save_update').val(id);
            $('#full_name').val(data.full_name);
            $('#education').val(data.education);
            $('#designation').val(data.designation);
            $('#experience').val(data.experience);
            $('#date').val(doj1);
            $('#leave_date').val(leave_date1);
            $('#experience_certificate').val(data.experience_certificate);
            $('#notice_period').val(data.notice_period).trigger('change');
            $('#notice_months').val(data.package_price);
            $('#reason').val(data.reason);
            $('#aadhar').val(data.aadhar);
            $('#behaviour').val(data.behaviour);
            $('#attendence').val(data.attendence);
            $('#sincerity').val(data.sincetity);
            $('#dependability').val(data.dependability);
            $('#filehidden1').val(data.profile_picture);


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
    $(document).on('click', ".enable_btn", function(e) {
        e.preventDefault();
        //alert("fd");
        var id = $(this).attr("id");
        var status = 1;
        $.ajax({
            data: {
                status: status,
                id: id,
            },
            url: change_status,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                datashow();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });

    });
    $(document).on('click', ".disable_btn", function(e) {
        e.preventDefault();
        //   alert("fd");
        var id = $(this).attr("id");
        var status = 0;
        $.ajax({
            data: {
                status: status,
                id: id,
            },
            url: change_status,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                datashow();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });

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

});
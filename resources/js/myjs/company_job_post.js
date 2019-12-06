$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#date').val('');
        $('#job_title').val('');
        $('#description').val('');
        $('#keywords').val('');
        $('#from').val('');
        $('#to').val('');
        $('#ctc').val('');
        $('#from_ctc').val('');
        $('#to_ctc').val('');
        $('#vacancies').val('');
        $('#location').val('');
        $('#industry').val('');
        $('#qualification').val('');
        $('#email').val('');
        $('#vanue').val('');
        $('#from_date').val('');
        $('#to_date').val('');
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
        $.get('get_all_company_job_post', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Job Post Date</font></th>' +
                '<th><font style="font-weight:bold">Job Title</font></th>' +
                '<th><font style="font-weight:bold">Job Description</font></th>' +
                '<th><font style="font-weight:bold">Keywords</font></th>' +
                '<th><font style="font-weight:bold">Vacancies</font></th>' +
                '<th><font style="font-weight:bold">Job Location</font></th>' +
                '<th><font style="font-weight:bold">Industry</font></th>' +
                '<th><font style="font-weight:bold">Share to All</font></th>' +
                '<th class="not-export-column"><font style="font-weight:bold">Operation</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].post_date;
                var fdateslt = date.split('-');
                var post_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var status_id = data[i].status;
                var status = "";
                var button = "";
                if (status_id == 0 || status_id == "0") {
                    status = "Disabled";
                    button = '<button name="edit" value="edit" class="enable_btn btn btn-xs btn-success" id=' + data[i].id + '>Enable</button>';
                } else {
                    status = "Enabled";
                    button = '<button name="edit" value="edit" class="disable_btn btn btn-xs btn-danger" id=' + data[i].id + '>Disable</button>';
                }

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + post_date + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].job_title + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].description + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].keywords + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].vacancies + '</td>' +

                    '<td id="cus_name_' + data[i].id + '">' + data[i].location + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].industry + '</td>' +
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
                        title: 'Company Job Post',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Company Job Post',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                        },


                    }
                ]
            });
        })

        $.get('get_all_company_job_post2', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud2" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Job Post Date</font></th>' +
                '<th><font style="font-weight:bold">Job Title</font></th>' +
                '<th><font style="font-weight:bold">Job Description</font></th>' +
                '<th><font style="font-weight:bold">Keywords</font></th>' +
                '<th><font style="font-weight:bold">Vacancies</font></th>' +
                '<th><font style="font-weight:bold">Job Location</font></th>' +
                '<th><font style="font-weight:bold">Industry</font></th>' +
                '<th><font style="font-weight:bold">Company Name</font></th>' +
                '<th><font style="font-weight:bold">Contact Number</font></th>' +
                '<th><font style="font-weight:bold">Email</font></th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].post_date;
                var fdateslt = date.split('-');
                var post_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + post_date + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].job_title + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].description + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].keywords + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].vacancies + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].location + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].industry + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].company_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].mobile + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].company_email + '</td>' +
                    '</tr>';
            }
            html += '</tbody></table>';
            $('#show_master2').html(html);
            $('#laravel_crud2').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',

                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Other Company Job Post',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Other Company Job Post',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        },


                    }
                ]
            });
        })

    }
    $(document).on('click', ".edit_data", function(e) {
        e.preventDefault();
        $(".tablehideshow").hide();
        $(".formhideshow").show();
        var id = $(this).attr("id");
        // alert(id);
        $.get('company_postjob/' + id + '/edit', function(data) {
            //  alert(id);

            var date = data.post_date;
            var fdateslt = date.split('-');
            var post_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

            var date = data.date_from;
            var fdateslt = date.split('-');
            var date_from = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

            var date = data.date_to;
            var fdateslt = date.split('-');
            var date_to = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#date').val(post_date);
            $('#job_title').val(data.job_title);
            $('#description').val(data.description);
            $('#keywords').val(data.keywords);
            $('#from').val(data.experience_from);
            $('#to').val(data.experience_to);
            $('#ctc').val(data.ctc);
            $('#from_ctc').val(data.from_ctc);
            $('#to_ctc').val(data.to_ctc);
            $('#vacancies').val(data.vacancies);
            $('#location').val(data.location);
            $('#industry').val(data.industry);
            $('#qualification').val(data.qualification);
            $('#email').val(data.email);
            $('#vanue').val(data.venue);
            $('#from_date').val(date_from);
            $('#to_date').val(date_to);



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
    });

});
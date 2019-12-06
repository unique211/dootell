$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#btnprint').hide();
        $('#date').val('');
        $('#date2').val('');
        $('#designation').val('');
        $('#emp_name').val('');

    }

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



                successTost("Saved Successfully");
                $('#save_update').val(data);
                $('#btnprint').show();

                $('#btnprint').val(data);

                datashow();
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
            console.log(data);
            html = '';
            //alert(html);
            var name = '';
            html += '<option selected disabled value="">Select</option>';
            for (i = 0; i < data.length; i++) {
                var id = '';
                // alert(data.length);
                name = data[i].full_name;
                id = data[i].id;
                html += '<option value="' + id + '" >' + name + '</option>';
            }
            $(".employee").html(html);
        });


        $.get('get_all_company_emp_experience', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Employee</font></th>' +
                '<th><font style="font-weight:bold">Designation</font></th>' +
                '<th><font style="font-weight:bold">Joining Date</font></th>' +
                '<th><font style="font-weight:bold">Leave Date</font></th>' +


                '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].doj;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                var date = data[i].leave_date;
                var fdateslt = date.split('-');
                var leave_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];





                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].full_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].designation + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + leave_date1 + '</td>' +


                    '<td class="not-export-column"><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
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
                        title: 'Company Customer',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5, 6, 7]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Company Customer',
                        exportOptions: {
                            columns: [0, 1, 2, 4, 5, 6, 7]
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
        $.get('company_emp_experience/' + id + '/edit', function(data) {
            console.log(data);
            //   alert(data);

            var date = data.doj;
            var fdateslt = date.split('-');
            var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

            var date = data.leave_date;
            var fdateslt = date.split('-');
            var leave_date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#date').val(doj1);
            $('#date2').val(leave_date1);
            $('#emp_name').val(data.emp_id);
            $('#designation').val(data.designation);
            $('#btnprint').show();

            $('#btnprint').val(id);




        });
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
        $('#btnprint').hide();
        form_clear();
    });
    $(document).on('click', ".closehideshow", function(e) {
        e.preventDefault();

        form_clear();
    });

});
$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#date').val('');
        $('#customer_name').val('');
        $('#amount').val('');
        $('#address').val('');
        $('#aadhar').val('');

        $('#narration').val('');
        $('#filehidden1').val('');
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
        $.get('get_all_company_customer', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Date</font></th>' +
                '<th><font style="font-weight:bold">Customer Name</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Aadhar Number</font></th>' +
                '<th><font style="font-weight:bold">Address</font></th>' +
                '<th><font style="font-weight:bold">Share to All</font></th>' +
                '<th><font style="font-weight:bold">Narration</font></th>' +

                '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;

                var date = data[i].date;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

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
                    '<td id="cus_name_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].customer_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/Company/customer/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].amount + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].address + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + status + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].narration + '</td>' +


                    '<td class="not-export-column">' + button + '&nbsp;<button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
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

        $.get('get_all_company_customer2', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud2" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Date</font></th>' +
                '<th><font style="font-weight:bold">Customer Name</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Aadhar Number</font></th>' +
                '<th><font style="font-weight:bold">Address</font></th>' +
                '<th><font style="font-weight:bold">Narration</font></th>' +
                '<th><font style="font-weight:bold">Company Name</font></th>' +
                '<th><font style="font-weight:bold">Contact Number</font></th>' +
                '<th><font style="font-weight:bold">Email</font></th>' +

                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].date;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                var status_id = data[i].status;


                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].customer_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/Company/customer/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].amount + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].address + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].narration + '</td>' +
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
                        title: 'Other Company Customer',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Other Company Customer',
                        exportOptions: {
                            columns: [0, 1, 3, 4, 5]
                        },


                    }
                ]
            });
        })

        $.get('get_company_customer_limit', function(data) {
            if (data == 2 || data == "2") {
                swal("Limit Over !!", "Hey, Your Create Customer Limit is Over !!", "warning");
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
        $.get('company_customers/' + id + '/edit', function(data) {
            //  alert(id);

            var date = data.date;
            var fdateslt = date.split('-');
            var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#date').val(doj1);
            $('#customer_name').val(data.customer_name);
            $('#amount').val(data.amount);
            $('#address').val(data.address);
            $('#aadhar').val(data.aadhar);

            $('#narration').val(data.narration);
            $('#filehidden1').val(data.image);



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
        form_clear();
    });
    $(document).on('click', ".closehideshow", function(e) {
        e.preventDefault();
        form_clear();
    });

});
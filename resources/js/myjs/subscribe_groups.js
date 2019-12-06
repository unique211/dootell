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
        $.get('get_all_subscribed_groups', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Name</font></th>' +
                '<th><font style="font-weight:bold">Subject</font></th>' +

                '<th class="not-export-column"><font style="font-weight:bold">Operation</font>   </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var sub = '';

                if (data[i].subject == null) {

                    sub = '';

                } else {
                    sub = data[i].subject;
                }


                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/groups/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].group_name + '</td>' +

                    '<td id="cus_name_' + data[i].id + '">' + sub + '</td>' +


                    '<td class="not-export-column"><a href="' + notification + '/' + data[i].group_id + '" class="btn btn-xs btn-success">Notifications</a>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                    data[i].id + '>Remove</button></td>' + '</tr>';
            }
            html += '</tbody></table>';
            $('#show_master').html(html);
            $('#laravel_crud').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Subscribed Groups List',
                        exportOptions: {
                            columns: [0, 2, 3]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Subscribed Groups List',
                        exportOptions: {
                            columns: [0, 2, 3]
                        },
                    }
                ]
            });
        })

        $.get('get_all_suggested_groups', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud2" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>' +
                '<th><font style="font-weight:bold">Name</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Subject</font></th>' +
                '<th class="not-export-column"><font style="font-weight:bold">Operation</font></th>' +

                '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                // var date = data[i].date;
                // var fdateslt = date.split('-');
                // var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                var sub = '';

                if (data[i].subject == null) {

                    sub = '';

                } else {
                    sub = data[i].subject;
                }



                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/groups/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].group_name + '</td>' +
                    '<td id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                    '<td id="amount_' + data[i].id + '">' + sub + '</td>' +
                    '<td class="not-export-column"><button name="edit" value="edit" class="add_data btn btn-xs btn-success" id=' +
                    data[i].id +
                    '>Add</button></td>' + '</tr>';
            }
            html += '</tbody></table>';
            $('#show_master2').html(html);
            $('#laravel_crud2').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Suggested Groups List',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Suggested Groups List',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
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
    $(document).on('click', ".add_data", function(e) {
        e.preventDefault();
        //alert("fd");
        var id = $(this).attr("id");
        var amount = $("#amount_" + id).text();
        //   alert(amount);

        if (amount == 0 || amount == "0") {

            $.ajax({
                data: {
                    amount: amount,
                    id: id,
                },
                url: add_data,
                type: "POST",
                dataType: 'json',
                success: function(data) {

                    successTost("Subscribed Successfully");
                    datashow();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        } else {
            $("#return_id").val(amount);
            $("#group_id").val(id);
            $('#hidden_form').submit();



        }

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
                    title: "Are you sure to Remove ?",
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
                                swal("Removed !!", "Hey, your Group has been Removed !!", "success");
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
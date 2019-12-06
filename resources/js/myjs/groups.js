$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#group_name').val('');


        $('#amount').val('');
        $('#subject').val('');

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
        var sub_menu = "Groups";
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

        $.get('get_all_groups', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Group Name</font></th>' +
                '<th><font style="font-weight:bold">Subject</font></th>' +
                '<th><font style="font-weight:bold">Amount</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>';
            if (rights == 1) {
                html += '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>';
            }
            html += '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                // var date = data[i].date;
                // var fdateslt = date.split('-');
                // var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].group_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].subject + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].amount + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/groups/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>';
                if (rights == 1) {
                    html += '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
                        data[i].id +
                        '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                        data[i].id + '><i class="fa fa-trash"></i></button></td>' + '</tr>';
                }


            }
            html += '</tbody></table>';
            $('#show_master').html(html);
            $('#laravel_crud').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Group List',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Group List',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
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
        $.get('groups/' + id + '/edit', function(data) {
            //  alert(id);

            // var date = data.date;
            // var fdateslt = date.split('-');
            // var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#group_name').val(data.group_name);
            $('#subject').val(data.subject);
            $('#amount').val(data.amount);
            $('#filehidden1').val(data.image);




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
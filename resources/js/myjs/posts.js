$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#group_name').val('');
        $('#title').val('');
        $('#date').val('');
        $('#description').val('');
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
                $(':input[type="submit"]').prop('disabled', false);
                $(".closehideshow").trigger('click');
                form_clear();
                successTost("Saved Successfully");
                $('#save_update').val('');

                datashow();
                $("#if_yes").hide();

            },
            error: function(data) {
                console.log('Error:', data);
                //  $('#btn-save').html('Save Changes');
            }
        });


    });
    datashow();

    function datashow() {

        var sub_menu = "Posts";
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
            console.log(data);
            html = '';
            //alert(html);
            var name = '';
            html += '<option selected disabled value="">Select</option>';
            for (i = 0; i < data.length; i++) {
                var id = '';
                // alert(data.length);
                name = data[i].group_name;
                id = data[i].id;
                html += '<option value="' + id + '" >' + name + '</option>';
            }
            $("#group_name").html(html);
        })


        $.get('get_all_posts', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Date</font></th>' +
                '<th><font style="font-weight:bold">Group Name</font></th>' +
                '<th><font style="font-weight:bold">Post Title</font></th>';
            if (rights == 1) {
                html += '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>';
            }
            html += '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;

                var date = data[i].date;
                var fdateslt = date.split('-');
                var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="id_' + data[i].id + '">' + date + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].group_name + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].title + '</td>';
                if (rights == 1) {
                    html += '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' +
                        data[i].id +
                        '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' +
                        data[i].id + '><i class="fa fa-trash"></i></button></td>';
                }




            }
            html += '</tr></tbody></table>';
            $('#show_master').html(html);
            $('#laravel_crud').DataTable({
                pageLength: 50,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        title: 'Posts List',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Posts List',
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
        $.get('posts/' + id + '/edit', function(data) {
            //  alert(id);

            var date = data.date;
            var fdateslt = date.split('-');
            var date1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#date').val(date1);
            $('#group_name').val(data.group_id);
            $('#title').val(data.title);
            $('#description').val(data.description);
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
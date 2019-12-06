$(document).ready(function() {
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#title').val('');
        $('#package_type').val('');
        $('#validity').val('');
        $('#price').val('');
        $('#image').val('');
        $('#filehidden1').val('');
        $('#no_of_candidate').val('');
        $("#if_c").hide();
        $("#if_company").hide();
    }

    $(document).on('change', "#package_type", function(e) {
        e.preventDefault();
        $("#if_c").hide();
        $("#if_company").hide();
        $("#no_of_candidate").val(0);
        $("#no_of_customer").val(0);
        var package_type = $("#package_type").val();
        var no_of_candidate = $("#no_of_candidate").val();
        if (package_type == "Consultancy") {
            $("#if_c").show();
            $("#if_company").hide();
        } else if (package_type == "Company") {
            $("#if_c").show();
            $("#if_company").show();
        } else {
            $("#if_c").hide();
            $("#if_company").hide();
            $("#no_of_candidate").val(0);
            $("#no_of_customer").val(0);
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
                $(':input[type="submit"]').prop('disabled', false);
                $(".closehideshow").trigger('click');
                form_clear();
                successTost("Saved Successfully");
                $('#save_update').val('');

                datashow();
                $("#if_c").hide();

            },
            error: function(data) {
                console.log('Error:', data);
                //  $('#btn-save').html('Save Changes');
            }
        });


    });
    datashow();

    function datashow() {

        var sub_menu = "Package_List";
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
        $.get('get_all_package_lists', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Package Type</font></th>' +
                '<th><font style="font-weight:bold">Package Title</font></th>' +
                '<th><font style="font-weight:bold">Validity</font></th>' +
                '<th><font style="font-weight:bold">Price</font></th>' +
                '<th><font style="font-weight:bold">No of candidates can register</font></th>' +
                '<th><font style="font-weight:bold">Image</font></th>';
            if (rights == 1) {
                html += '<th class="not-export-column"><font style="font-weight:bold">Action</font>   </th>';
            }

            html += '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].package_type + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].package_title + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].package_validity + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].package_price + '</td>' +
                    '<td id="cus_name_' + data[i].id + '">' + data[i].no_of_candidate + '</td>' +
                    '<td id="cus_name_' + data[i].id + '"><img src = "uploads/' + data[i].image + '" class="img-thumbnail" style="width:100px; height:100px;" /></td>';
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
                        title: 'Package List',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Package List',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
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
        $.get('package_list/' + id + '/edit', function(data) {
            //  alert(id);
            $('#save_update').val(id);
            $('#title').val(data.package_title);
            $('#package_type').val(data.package_type).trigger('change');
            $('#validity').val(data.package_validity);
            $('#price').val(data.package_price);
            // $('#image').val(data.image);
            $('#filehidden1').val(data.image);
            $('#no_of_candidate').val(data.no_of_candidate);
            $('#no_of_customer').val(data.no_of_customer);

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
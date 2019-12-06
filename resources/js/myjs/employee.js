$(document).ready(function() {

    var multiple = "";
    //added comment
    function form_clear() {
        $('#save_update').val('');
        $('#employee_name').val('');
        $('#date').val('');
        $('#user_type').val('');
        $('#mobile').val('');
        $('#email').val('');
        $('#password').prop('required', true);
        $('#c_password').prop('required', true);
        $("#submit_btn").attr("disabled", false);
        $("#if_group_admin").hide();
        $("#group_name").val('');
        $('.main_chk').prop('checked', true).trigger('change');
        multiple = "";
    }

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
            $.get('./get_email/' + email, function(data) {

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


    $(document).on('change', "#user_type", function(e) {
        e.preventDefault();
        var user_type = $("#user_type").val();
        $("#if_group_admin").hide();
        $("#group_name").val('');

        if (user_type == "Group_Admin") {
            $("#if_group_admin").show();
        } else {
            $("#if_group_admin").hide();
            $("#group_name").val('');
        }


    });



    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();
        // alert("in submit");
        $(':input[type="submit"]').prop('disabled', true);
        var save_update = $("#save_update").val();
        var employee_name = $("#employee_name").val();
        var date = $("#date").val();
        var user_type = $("#user_type").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var groups_id = $("#group_name").val();
        var urdata = new Array();
        var count = 0;
        var menu = 0;
        //  alert(groups_id);

        if (save_update != "") {

            $.ajax({
                data: {
                    save_update: save_update,

                },
                url: delete_from_user_rights,
                type: "POST",
                dataType: 'json',
                async: false,
                success: function(data) {
                    //

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        }
        $(".main_chk").each(function() {
            var id1 = $(this).attr('id');
            id1 = id1.split("_");
            var menu = $(this).val();
            if (menu == 1 || menu == "1") {

                var id = id1;

                if ($('#main_chk_' + id[1]).prop('checked')) {
                    urdata[count] = [id[1], 0];
                } else {
                    urdata[count] = [id[1], 1];
                }
                count++;

            }


        });

        //  var urdata = new Array();
        // var count = 0;
        // $(".mmenu").each(function() {
        //     var id = $(this).attr('id');
        //     id = id.split("_");
        //     console.log($(this).attr('id'));
        //     if ($(this).prop('checked')) {
        //         urdata[count] = [id[1], id[2], 0];
        //     } else {
        //         urdata[count] = [id[1], id[2], 1];
        //     }
        //     count++;
        // });


        //  alert(groups_id);
        $.ajax({
            data: {
                urdata: urdata,
                save_update: save_update,
                employee_name: employee_name,
                date: date,
                user_type: user_type,
                groups_id: groups_id,
                mobile: mobile,
                email: email,
                password: password,

            },
            url: add_data,
            type: "POST",
            dataType: 'json',
            // async: false,
            success: function(data) {


                // alert(data);
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

        var sub_menu = "Group_Admin";
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





        $.ajax({
            type: "POST",
            url: 'get_menu',
            dataType: "JSON",
            // data: {
            //     id: mid
            // },
            async: false,
            success: function(data) {

                // $.get('get_menu', function(data) {
                var data = eval(data);
                var table = '';
                var table_s = '';
                for (var i = 0; i < data.length; i++) {
                    var cnt = 0;
                    table_s = '';
                    var mid = data[i].id;
                    console.log(data[i].id + ' ' + data[i].menu_name);
                    $.ajax({
                        type: "POST",
                        url: 'get_sub_menu/' + mid,
                        dataType: "JSON",
                        // data: {
                        //     id: mid
                        // },
                        async: false,
                        success: function(result) {
                            //   $.get('get_sub_menu/' + mid, function(result) {
                            var result = eval(result);
                            console.log(result);
                            cnt = result.length;


                            for (var i = 0; i < cnt; i++) {

                                table_s += '<tr class="sub_menu">' +
                                    '<td ><span >' + result[i].sub_menu_name + '</span></td>' +
                                    '<td><input type="radio" class="mmenu" name="main_chk_' + mid + '" value="readonly" id="main_chk_' + mid + '" checked="true"/></td>' +
                                    '<td><input type="radio" class="smenu" name="main_chk_' + mid + '" value="modify" id="main_chk2_' + mid + '"/></td>' +
                                    '</tr>';
                                // alert(table_s);
                            }

                        }
                    });

                    if (cnt == 0) {
                        table += '<tr class="main_menu">' +
                            '<td><span ><input type="checkbox" checked id="_' + data[i].id + '" name="' + data[i].id + '" class="main_chk" value="1">' + data[i].menu_name + '</span></td>' +
                            '<td><input type="radio" class="mmenu" name="main_menu_' + data[i].id + '" value="readonly" id="r_' + mid + '_0' + '" checked="true"/></td>' +
                            '<td><input type="radio" class="smenu" name="main_menu_' + data[i].id + '" value="modify" id="m_' + mid + '_0' + '"/></td>' +
                            '</tr>';
                    } else {
                        table += '<tr class="main_menu">' +
                            '<td><span ><input type="checkbox" checked  class="main_chk"  id="_' + data[i].id + '" name="' + data[i].id + '" value="1">' + data[i].menu_name + '</span></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '</tr>';
                    }

                    table += table_s;
                }
                $('#tbd_user_rights').html(table);

            }
        });






        $.get('get_all_employee', function(data) {

            var data = eval(data);
            var html = '';
            html += '<table id="laravel_crud" style="width:100%;" class=" table table-striped">' +
                '<thead>' +
                '<tr>' +
                '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                '<th><font style="font-weight:bold">Employee Name</font></th>' +
                '<th><font style="font-weight:bold">Date of Joining</font></th>' +
                '<th><font style="font-weight:bold">User Type</font></th>' +
                '<th><font style="font-weight:bold">Mobile Number</font></th>';
            if (rights == 1) {
                html += '<th class="not-export-column"><font style="font-weight:bold">Operation</font>   </th>';
            }

            html += '</tr>' +
                '</thead>' +
                '<tbody>';
            for (var i = 0; i < data.length; i++) {
                var sr = i + 1;
                var date = data[i].doj;
                var fdateslt = date.split('-');
                var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                html += '<tr>' +
                    '<td id="id_' + data[i].id + '">' + sr + '</td>' +
                    '<td id="employee_name_' + data[i].id + '">' + data[i].employee_name + '</td>' +
                    '<td id="doj1_' + data[i].id + '">' + doj1 + '</td>' +
                    '<td id="user_type_' + data[i].id + '">' + data[i].user_type + '</td>' +
                    '<td id="mobile_' + data[i].id + '">' + data[i].mobile + '</td>';


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
                        title: 'Employee List',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },

                    },
                    {
                        extend: 'print',
                        title: 'Employee List',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        },


                    }
                ]
            });
        })

        $.get('get_all_groups', function(data) {
            console.log(data);
            html = '';
            //alert(html);
            var name = '';

            for (i = 0; i < data.length; i++) {
                var id = '';
                // alert(data.length);
                name = data[i].group_name;
                id = data[i].id;
                html += '<option value="' + id + '" >' + name + '</option>';
            }
            $("#group_name").html(html);
            //   $("#group_name").val(multiple);

            $('#group_name').multiselect('rebuild');


        })

    }
    $(document).on('click', ".edit_data", function(e) {
        e.preventDefault();
        $(".tablehideshow").hide();
        $(".formhideshow").show();

        var id = $(this).attr("id");
        datashow();
        // alert(id);
        $.get('employee/' + id + '/edit', function(data) {
            //  alert(id);

            var date = data.doj;
            var fdateslt = date.split('-');
            var doj1 = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


            $('#save_update').val(id);
            $('#employee_name').val(data.employee_name);
            $('#date').val(doj1);
            $('#user_type').val(data.user_type).trigger('change');
            $('#mobile').val(data.mobile);
            $('#email').val(data.email);
            $('#password').removeAttr('required');
            $('#c_password').removeAttr('required');

            if (data.user_type == "Group_Admin") {
                //    var roles = data.groups_id;
                multiple = data.groups_id;


                var selectedOptions = multiple.split(",");
                for (var i in selectedOptions) {
                    var optionVal = selectedOptions[i];
                    $("#group_name").find("option[value=" + optionVal + "]").prop("selected", true);
                    //  alert(optionVal);
                }
                $("#group_name").multiselect('rebuild');
            }



        });
        $('.main_chk').prop('checked', false).trigger('change');
        $.get('user_rights/' + id, function(data) {
            var data = eval(data);

            for (var i = 0; i < data.length; i++) {
                if (data[i].user_rights == 0) {

                    $('#main_chk_' + data[i].menu_id).prop('checked', true);


                } else {
                    $('#main_chk2_' + data[i].menu_id).prop('checked', true);

                }
                $('#_' + data[i].menu_id).prop('checked', true).trigger('change');
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
                                var user_type = $("#user_type_" + id1).html();
                                $.ajax({
                                    data: {
                                        user_type: user_type,
                                        id: id1,
                                    },
                                    url: delete_from_login,
                                    type: "POST",
                                    dataType: 'json',
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
    $(document).on('change', ".main_chk", function(e) {
        e.preventDefault();
        //  alert('hh');
        if ($(this).is(":checked")) {
            $(this).val(1);
            $("#roll_no_mdl").prop('required', true);

        } else {
            $(this).val(0);
            //  $("#roll_no_mdl").prop('required', false);

        }
    });
});
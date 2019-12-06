$(document).ready(function() {
    $(document).on('blur', "#c_password", function(e) {
        e.preventDefault();
        var password = $("#password").val();
        var cpassword = $('#c_password').val();
        $("#btn_submit").attr("disabled", false);
        if (password != "" && cpassword != "") {
            if (password != cpassword) {
                // swal("Password not match", "Hey, please enter password and confirm password same !!", "error");
                $("#btn_submit").attr("disabled", true);
                $('#conformpass').show();
                $("#c_password").val('');
            } else {
                $("#btn_submit").attr("disabled", false);
                $('#conformpass').hide();

            }
        }
    });
    $(document).on('submit', "#change_form", function(e) {
        e.preventDefault();
        $(':input[type="submit"]').prop('disabled', true);
        var password = $("#password").val();
        var cpassword = $('#c_password').val();

        $.ajax({
            data: $('#change_form').serialize(),
            url: change,
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $(':input[type="submit"]').prop('disabled', false);
                console.log(data);
                location.href = redirect;

            },
            error: function(data) {
                console.log('Error:', data);

            }
        });
    });
});
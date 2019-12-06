$(document).ready(function() {
    //


    $(document).on('click', ".btn_add", function(e) {
        e.preventDefault();
        var group_id = $("#group_id").val();
        var post_id = $(this).attr('id');
        var comment = $("#comment_" + post_id).val();

        if (comment == "") {
            swal("Empty !!", "Hey, your Comment is Empty !!", "error");
        } else {
            $.ajax({
                data: {
                    group_id: group_id,
                    post_id: post_id,
                    comment: comment,
                },
                url: add_comment,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    // $("#master_form").trigger('reset');
                    successTost("Comment Added");
                    location.reload();
                    // $("#close_model").trigger('click');
                    $("#comment_" + post_id).val('');

                    // datashow();



                },
                error: function(data) {
                    console.log('Error:', data);

                }
            });
        }



    });

    // $(document).on('submit', "#verify_form", function(e) {
    //     e.preventDefault();


    //     var group_id = $("#group_id").val();
    //     var post_id = $("#post_id").val();
    //     var comment = $("#comment").val();


    //     $.ajax({
    //         data: {
    //             group_id: group_id,
    //             post_id: post_id,
    //             comment: comment,
    //         },
    //         url: add_comment,
    //         type: "POST",
    //         dataType: 'json',
    //         success: function(data) {
    //             // $("#master_form").trigger('reset');
    //             successTost("Comment Added");

    //             $("#close_model").trigger('click');
    //             $("#comment").val('');

    //             datashow();



    //         },
    //         error: function(data) {
    //             console.log('Error:', data);

    //         }
    //     });


    //});
    // datashow();

    // function datashow() {
    //     var group_id = $("#group_id").val();
    //     var post_id = $(".post_id").val();

    //     $.ajax({
    //         data: {
    //             group_id: group_id,
    //             post_id: post_id,

    //         },
    //         url: get_comment,
    //         type: "POST",
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //             var data = eval(data);
    //             var html = '';


    //             for (var i = 0; i < data.length; i++) {

    //                 var fdateval = data[i].updated_at;
    //                 var fdateslt = fdateval.split('-');
    //                 var time = fdateslt[2].split(' ');
    //                 var date = time[0] + '/' + fdateslt[1] + '/' + fdateslt[0];

    //                 html += '<li><div class="commenterImage"><img src="../resources/img/how-work3.png" /></div>' +
    //                     '<div class = "commentText"><p class = "" >' + data[i].comment + '</p>' +
    //                     '<span class = "date sub-text" > on ' + date + ' </span></div> </li > ';
    //             }
    //             $('.commentList').html(html);
    //         }
    //     });


    //}



});
$(document).ready(function() {
    $('.like').click(function () { 
        comentId = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "procesarLike.php",
            data: {comentId:comentId},
            success: function (r) {
              $('#likes'+comentId+'').html(r);
            }
        });
    });
});

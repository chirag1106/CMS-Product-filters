$(document).ready(function() {
    $('.excel-form').submit(function(e) {
        e.preventDefault();
        var action = $(this).attr('action');
        $.ajax({
            url: action,
            method: 'post',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#process').show();
                var percentage = 0;
                var timer = setInterval(() => {
                    percentage += 20;
                    progress_bar_process(percentage, timer);
                }, 200);
            },
            success: function(response) {
                if (response.status == 'true') {
                    console.log(response.message);
                    $('#file-error').removeClass('text-danger').addClass('text-success').text(response.message);
                } else {
                    console.log(response.message);
                    $('#file-error').removeClass('text-success').addClass('text-danger').text(response.message);
                }
            },
        });


    });

    function progress_bar_process(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('.excel-form')[0].reset();
        }
    }
});

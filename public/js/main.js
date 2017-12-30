jQuery(document).ready(function ($) {

    $('#addChannelForm').submit(function (e) {
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var url = $('#channel').val();
        var category = $('#category').val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/add',
                type: 'POST',
                data: {
                    "token": token,
                    "url": url,
                    "category": category
                },

                success: function () {
                    $('.myerror').html('<div class="alert alert-success" style="text-align: center">Ваш канал добавлен, ожидайте одобрение администрации.</div>');
                    $('#load').fadeOut(100);
                    setTimeout("$('.modal').modal('hide')", 3500);
                    $('#submitChannel').prop('disabled', true);
                },
                error: function () {
                    $('.myerror').html('<div class="alert alert-danger" style="text-align: center">Ссылка на канал введена не коректно.</div>');
                    $('#load').fadeOut(100);
                }
            });

        });
    });

});
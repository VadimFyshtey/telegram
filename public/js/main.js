jQuery(document).ready(function ($) {

    //addChannel
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

    //Sort
    $('.sort select').on('change', function (e) {
        e.preventDefault();
        var sort = $("option:selected", this).attr('data-sort');

        $.ajax({
            url: '/' + sort,
            type: 'get',
            data: 'sort_name='+sort,

            success: function (html) {
                $('body').html(html);

                var str = sort;
                history.pushState(null, null, str);
            },
            error: function () {

            }
        });
    });

    $('.sort_category select').on('change', function (e) {
        e.preventDefault();

        // var id = Number(window.location.href.replace(/\D+/g,""));
        var arr = window.location.href.split('/');
        var id = arr[4];
        id = parseInt(id);
        var sort = $("option:selected", this).attr('data-sort');
        $.ajax({
            url: '/category/' + id + '/' + sort ,
            type: 'get',
            data: 'sort_name='+sort,

            success: function (html) {
                $('body').html(html);

                    var str = '/category/' +  id + '/' + sort;
                    history.pushState(null, null, str);

            },
            error: function () {

            }
        });
    });

    //Sort News
    $('.sort_news select').on('change', function (e) {
        e.preventDefault();
        var sort = $("option:selected", this).attr('data-sort');

        $.ajax({
            url: '/news/' + sort,
            type: 'get',
            data: 'sort_name='+sort,

            success: function (html) {
                $('body').html(html);

                var str = '/news/' + sort;
                history.pushState(null, null, str);
            },
            error: function () {

            }
        });
    });

    $('.sort_news_category select').on('change', function (e) {
        e.preventDefault();

        // var id = Number(window.location.href.replace(/\D+/g,""));
        var arr = window.location.href.split('/');
        var id = arr[5];
        id = parseInt(id);
        var sort = $("option:selected", this).attr('data-sort');
        $.ajax({
            url: '/news/category/' + id + '/' + sort ,
            type: 'get',
            data: 'sort_name='+sort,

            success: function (html) {
                $('body').html(html);

                var str = '/news/category/' +  id + '/' + sort;
                history.pushState(null, null, str);

            },
            error: function () {

            }
        });
    });
});
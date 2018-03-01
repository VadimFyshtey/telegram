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
                url: '/add_channel',
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

    //addTrade
    $('#addTradeForm').submit(function (e) {
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var url = $('#channel_trade').val();
        var category = $('#category_trade').val();
        var time_top = $('#time_top').val();
        var time_lenta = $('#time_lenta').val();
        var contact = $('#contact').val();
        var pr;
        if($("#pr").prop("checked") === true) {
             pr = 1;
        } else{
             pr = 0;
        }
        var price = $('#price').val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/add_trade',
                type: 'POST',
                data: {
                    "token": token,
                    "url": url,
                    "category": category,
                    "time_top": time_top,
                    "time_lenta": time_lenta,
                    "contact": contact,
                    "pr": pr,
                    "price": price
                },

                success: function () {
                    $('.myerror').html('<div class="alert alert-success" style="text-align: center">Ваш канал добавлен в биржу, ожидайте одобрение администрации.</div>');
                    $('#load').fadeOut(100);
                    setTimeout("$('.modal').modal('hide')", 3500);
                    $('#submitTrade').prop('disabled', true);
                },
                error: function () {
                    $('.myerror').html('<div class="alert alert-danger" style="text-align: center">Ссылка на канал введена не коректно.</div>');
                    $('#load').fadeOut(100);
                    console.log(pr);
                }
            });

        });
    });

    //Trade Sort
    $('.trade_filter .sort input').on('change', function (e) {
        e.preventDefault();

        var sort_val = $(this).val();
        var sort_name = $(this).attr('name');
        var id = $(this).attr('data-id');

        var filter_is_category_val = $('.trade_filter .sort_category_filter input:checked').val();
        var filter_is_category_name = $('.trade_filter .sort_category_filter input:checked').attr('name');

        var allUrl =  sort_name + "_" + sort_val;

        $.ajax({
            url: '/trade/',
            type: 'get',
            data: {
                    sort_val: sort_val,
                    sort_name : sort_name,
                    filter_is_category_val: filter_is_category_val,
                    filter_is_category_name: filter_is_category_name
                  },

            success: function (html) {
                $('body').html(html);
                $('.sort input').eq(id - 1).prop('checked', true);
                $('.sort_category_filter input').eq(filter_is_category_val - 1).prop('checked', true);

                if(filter_is_category_val != undefined){
                    var str = '/trade?category=' + filter_is_category_val + '&sort=' + allUrl;
                    history.pushState(null, null, str);
                }else{
                    var str = '/trade?sort=' + allUrl ;
                    history.pushState(null, null, str);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    //Trade filter Category
    $('.trade_filter .sort_category_filter input').on('change', function (e) {
        e.preventDefault();

        var filter_category = $(this).val();
        var filter_name = $(this).attr('name');

        var filter_is_sort_val = $('.trade_filter .sort input:checked').val();
        var filter_is_sort_name = $('.trade_filter .sort input:checked').attr('name');
        var filter_is_sort_id = $('.trade_filter .sort input:checked').attr('data-id');

        var allSort = filter_is_sort_name + '_' + filter_is_sort_id;

        $.ajax({
            url: '/trade/',
            type: 'get',
            data: {
                    filter_category: filter_category,
                    filter_name : filter_name,
                    filter_is_sort_val: filter_is_sort_val,
                    filter_is_sort_name: filter_is_sort_name

                  },

            success: function (html) {
                $('body').html(html);
                $('.sort_category_filter input').eq(filter_category - 1).prop('checked', true);
                $('.sort input').eq(filter_is_sort_id - 1).prop('checked', true);

                if(filter_is_sort_val != undefined){
                    var str = '/trade?category=' + filter_category + '&sort=' + allSort;
                    history.pushState(null, null, str);
                }else{
                    var str = '/trade?category=' + filter_category ;
                    history.pushState(null, null, str);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    //Sort
    $('.sort select').on('change', function (e) {
        e.preventDefault();
        var sort = $("option:selected", this).attr('data-sort');

        $.ajax({
            url: '/channel/' + sort,
            type: 'get',
            data: 'sort_name='+sort,

            success: function (html) {
                $('body').html(html);

                var str = /channel/ + sort;
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
            url: '/category/' + id + '/' + sort,
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
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>{{ MetaTag::get('title') }}</title>
    {!! MetaTag::tag('description') !!}
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="yandex-verification" content="0f1d86c2a9935d57" />
    <meta name='wmail-verification' content='c51e1c1e4f090b02f2da2f5ab12b0c1e' />

    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2586863288185463",
            enable_page_level_ads: true
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102624075-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-102624075-3');
    </script>
</head>
<body>
<header>
    @section('navbar')
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li><a href="{{ route('channel') }}">Каналы</a></li>
                                <li><a href="{{ route('trade') }}">Биржа</a></li>
                                <li><a href="{{ route('news') }}">Новости</a></li>
                                <li><a href="{{ route('service') }}">Услуги</a></li>
                                <li><a href="{{ route('contact') }}">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @show

    <div class="head">
        <div class="container">
            <div class="col-lg-3  col-md-3 col-sm-3 col-xs-3 logo">
                <a href="/">{!! Html::image('img/logo.png', 'Каталог телеграмм каналов') !!}</a>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                @if( preg_match ('#/channel#' ,  $_SERVER['REQUEST_URI'] ))
                    <h1>Каталог телеграмм каналов</h1>
                @elseif( preg_match ('#/trade#' ,  $_SERVER['REQUEST_URI'] ) )
                    <h1>Биржа телеграмм каналов</h1>
                @else
                    <h1>Биржа и каталог телеграмм каналов</h1>
                @endif

                <p>
                    В нас на сайте каталог самых популярных телеграмм каналов.<br/>
                    Каналы на любой вкус по категориям, вступайте,<br/>
                    читайте, добавляйте свои. Также биржа рекламы которая<br/>
                    поможит вам заработать на ваших каналах.
                </p>
                <form method="get" accept-charset="" action="{{ route('search') }}" id="h-search">
                    <input id='search' type="text" placeholder="Поиск каналов" name="q" />
                    <input type="submit" value="" />
                </form>
                @if( preg_match ('#/channel#' ,  $_SERVER['REQUEST_URI'] ))
                    <button class="btn btn-lg add-class" data-toggle="modal" data-target="#myModal_channel" id="addChannel">Добавить канал в каталог</button>
                @elseif( preg_match ('#/trade#' ,  $_SERVER['REQUEST_URI'] ) )
                    <button class="btn btn-lg add-class" data-toggle="modal" data-target="#myModal_trade" id="addTrade">Добавить канал в биржу</button>
                @endif

            </div>
        </div>
    </div>
</header>

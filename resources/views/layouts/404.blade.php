@extends('layouts.layout')

@section('popul')

@endsection

@section('content')
    <div class="col-lg-12 od">
        <h2>Ошибка 404</h2>
        <h3>Такой страницы не существует или адрес введён неверно.</h3>
        <h4>Перейдите пожалуйста на <a href="{{ route('home') }}">главную страницу </a>или воспользуйтесь <a href="#search">поиском.</a></h4>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Телеграм реклама -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-2586863288185463"
             data-ad-slot="3416746893"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>
@endsection
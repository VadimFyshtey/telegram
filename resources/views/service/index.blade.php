@extends('layouts.layout')

@section('popul')

@endsection

@section('content')
    <div class="col-lg-9">
        <h3>Услуги</h3>
        <div class="contact">
            {!! $service['content'] !!}
        </div>
        <br/>
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
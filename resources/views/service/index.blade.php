@extends('layouts.layout')

@section('popul')

@endsection

@section('content')
    <h3>Услуги</h3>
    <div class="contact">
    {!! $service['content'] !!}
    </div>

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

@endsection
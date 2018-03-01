@extends('layouts.layout_popul_bottom')

@section('content')
    <div class="col-lg-12 by88 center-class">

        <p><b>Сделал дизайн и сайт:</b> Вадим Фуштей</p>

        <p><b>Моя почта:</b> <a href="mailto:fyshtey@gmail.com" target="_blank" rel="nofollow">fyshtey@gmail.com</a></p>

        <p><b>Мой вк:</b> <a href="http://vk.com/vadim_xd" target="_blank" rel="nofollow">здесь</a></p>

        <h4>Сайт сделан на фреймворке laravel. По вопросу создание сайта под ключ писать на почту или в вк.</h4>

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

@section('popul')
    @if($channels_popul->isNotEmpty())
        <div class="col-lg-12">
            <h2>Популярные телеграмм каналы</h2>
            <div class="carusel">
                @foreach($channels_popul as $popul)
                    <div class="one_popul">
                        <h4 title="{{ $popul->name }}"><a target="_blank" href="{{ $popul->url }}">{{ mb_strimwidth($popul->name, 0, 35, "...") }}</a></h4>
                        {!! Html::image('img/channel/' . $popul->image, $popul->name) !!}
                        <span class="clearfix"></span>
                        <h6 class="pull-right">
                            <i class="glyphicon glyphicon-calendar"></i> {{ $popul->created_at->format('Y-m-d') }} <br/>
                        </h6>
                        <h6 class="pull-left">
                            <i class="glyphicon glyphicon-user"></i> > {{ $popul->subscribers }}
                        </h6>
                        <div class="clearfix"></div>
                        <h5 title="{{ $popul->description }}">{{ mb_strimwidth($popul->description, 0, 100, "...") }}</h5>
                        <a target="_blank" href="{{ $popul->url }}" class="url">Перейти на канал</a>
                    </div>
                @endforeach
            </div>
            <hr class="hr_home"/>
        </div>
    @endif
@endsection
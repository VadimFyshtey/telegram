@extends('layouts.layout')

@section('popul')
@if($channels_popul->isNotEmpty())
<div class="col-lg-9">
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

@section('content')
<div class="col-lg-9 od">
<h2>Все телеграм каналы</h2>

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

    @if($channels->isNotEmpty())
    <div class="sort pull-left">
        <span>Сортировать по: </span>
        <select class="pull-right">
            <option >Дате</option>
            <option data-sort="date">Новые</option>
            <option data-sort="date_asc">Старые</option>
        </select>
        <div class="clearfix hidden-md hidden-lg hidden-sm"></div>
        <select class="pull-right">
            <option >Подписчикам</option>
            <option data-sort="subscribers">Больше</option>
            <option data-sort="subscribers_asc">Меньше</option>
        </select>
    </div>
        <div class="clearfix  hidden-md"></div>
    @foreach($channels as $channel)
        <div class="col-lg-4 col-md-4 col col-sm-6 col-xs-12 one_chanel" >
                <h4 title="{{ $channel->name }}"><a target="_blank" href="{{ $channel->url }}">{{ $channel->name }}</a></h4>
                <div class="one_category">Категория:<a href="/category/{{ $channel->category->id }}"> {{ $channel->category->name }}</a></div>
                <hr class="one_category_hr" />
                {!! Html::image('img/channel/' . $channel->image, $channel->name) !!}
                <h5 title="{{ $channel->description }}">{{ mb_strimwidth($channel->description, 0, 100, "...") }}</h5>
                <span class="clearfix"></span>
                <h6 class="pull-right">
                    <i class="glyphicon glyphicon-calendar"></i> {{ $channel->created_at->format('Y-m-d') }} <br/>
                </h6>
                <h6 class="pull-left">
                    <i class="glyphicon glyphicon-user"></i> > {{ $channel->subscribers }}
                </h6>
                <div class="clearfix"></div>
                <a target="_blank" href="{{ $channel->url }}" class="url">Перейти на канал</a>

        </div>
    @endforeach
    <div class="clearfix"></div>
    <?php echo $channels->render(); ?>
    @else
        <h4>Каналов нет, <a href="" data-toggle="modal" data-target="#myModal" id="addChannel">добавте свой канал.</a></h4>
    @endif

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
@extends('layouts.layout')
@section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="category_menu">
            <h3>Категории</h3>
            <ul class="list_category">
                @foreach($data['category'] as $categ)
                    <li><a href="/category/{{ $categ['id'] }}">{{ $categ['name'] }}</a></li>
                @endforeach
            </ul>
        </section>
        <section class="random_chanel hidden-sm hidden-xs">
            <h3>Рандомный канал</h3>
            @if($data['randomChannel'])
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel_random" >
                    <h4 title="{{ $data['randomChannel']->name }}"><a target="_blank" href="{{ $data['randomChannel']->url }}">{{ $data['randomChannel']->name }}</a></h4>
                    <div class="one_category">Категория:<a href="/category/{{ $data['randomChannel']->category->id }}"> {{ $data['randomChannel']->category->name }}</a></div>
                    <hr class="one_category_hr" />
                    {!! Html::image('img/channel/' . $data['randomChannel']->image, $data['randomChannel']->name) !!}
                    <h5 title="{{ $data['randomChannel']->description }}">{{ mb_strimwidth($data['randomChannel']->description, 0, 80, "...") }}</h5>
                    <span class="clearfix"></span>
                    <h6 class="pull-right">
                        <i class="glyphicon glyphicon-calendar"></i> {{ $data['randomChannel']->created_at->format('Y-m-d') }} <br/>
                    </h6>
                    <h6 class="pull-left">
                        <i class="glyphicon glyphicon-user"></i> > {{ $data['randomChannel']->subscribers }}
                    </h6>
                    <div class="clearfix"></div>
                    <a target="_blank" href="{{ $data['randomChannel']->url }}" class="url">Перейти на канал</a>
                </div>
            @endif
        </section>
        <section class="reclama hidden-sm hidden-xs">
            <h3>Реклама</h3>
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
        </section>
        <section class="last_news hidden-sm hidden-xs">
            <h3>Последние новости</h3>
            @if($data['lastNews']->isNotEmpty())
                @foreach($data['lastNews'] as $news)
                    <p><a href="/news/detail/{{ $news->id }}">{{ $news->name }}</a></p>
                    {!! Html::image('img/news/' . $news->image , $news->name) !!}
                    <div class="last_news_short_content">{{ mb_strimwidth($news->short_content, 0, 80, "...") }}</div>
                    <div class="clearfix"></div>
                @endforeach
            @endif
        </section>
    </div>
@endsection
@section('popul')
@if($data['channelsPopul']->isNotEmpty())
<div class="col-lg-9">
    <section class="popul">
        <h2>Популярные телеграмм каналы</h2>
        <div class="carusel">
            @foreach($data['channelsPopul'] as $popul)
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
        <div class="link_service"><a href="{{ route('service') }}">Попасть сюда &#8593;</a></div>
        <hr class="hr_home"/>
    </section>
</div>
@endif
@endsection

@section('content')
<div class="col-lg-9">
    <h2>Категория: {{ $data['categoryOne']['name'] }}</h2>

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

    @if($data['channels']->isNotEmpty())
        <div class="sort_category pull-left">
            <span>Сортировать по: </span>
            <select class="pull-right">
                <option>Дате</option>
                <option data-sort="date">Новые</option>
                <option data-sort="date_asc">Старые</option>
            </select>
            <div class="clearfix hidden-md hidden-lg hidden-sm"></div>
            <select class="pull-right">
                <option>Подписчикам</option>
                <option data-sort="subscribers">Больше</option>
                <option data-sort="subscribers_asc">Меньше</option>
            </select>
        </div>
        <div class="clearfix  hidden-md"></div>
    @foreach($data['channels'] as $channel)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel one_chanel_category">
            <h4 title="{{ $channel->name }}"><a target="_blank" href="{{ $channel->url }}">{{ $channel->name }}</a></h4>
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
    <?php echo $data['channels']->render(); ?>
    @else
        <h4>Категория пустая, <a href="" data-toggle="modal" data-target="#myModal_channel" id="addChannel">добавте свой канал.</a></h4>
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
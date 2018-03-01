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
@section('content')
    <div class="col-lg-9">

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

        <h2>Поиск: <?= $data['q'] ?></h2>
        @if($data['channelsSearch']->isEmpty() || !($data['q']) || !isset($data['channelsSearch']) || count($data['channelsSearch']) == 0)
            <h3>Поиск не дал результата.</h3>
        @else
            @foreach($data['channelsSearch'] as $channel)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel">
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
                <?php echo $data['channelsSearch']->render(); ?>
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
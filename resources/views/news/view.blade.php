@extends('layouts.layout')

@section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="category_menu">
            <h3>Категории</h3>
            <ul class="list_category">
                @foreach($categoryNews as $categ)
                    <li><a href="/news/category/{{ $categ['id'] }}">{{ $categ['name'] }}</a></li>
                @endforeach
            </ul>
        </section>
        <section class="random_chanel hidden-sm hidden-xs">
            <h3>Рандомный канал</h3>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel_random" >
                <h4 title="{{ $random_channel->name }}"><a target="_blank" href="{{ $random_channel->url }}">{{ $random_channel->name }}</a></h4>
                <div class="one_category">Категория:<a href="/category/{{ $random_channel->category->id }}"> {{ $random_channel->category->name }}</a></div>
                <hr class="one_category_hr" />
                {!! Html::image('img/channel/' . $random_channel->image, $random_channel->name) !!}
                <h5 title="{{ $random_channel->description }}">{{ mb_strimwidth($random_channel->description, 0, 80, "...") }}</h5>
                <span class="clearfix"></span>
                <h6 class="pull-right">
                    <i class="glyphicon glyphicon-calendar"></i> {{ $random_channel->created_at->format('Y-m-d') }} <br/>
                </h6>
                <h6 class="pull-left">
                    <i class="glyphicon glyphicon-user"></i> > {{ $random_channel->subscribers }}
                </h6>
                <div class="clearfix"></div>
                <a target="_blank" href="{{ $random_channel->url }}" class="url">Перейти на канал</a>
            </div>
        </section>
        <section class="reclama hidden-sm hidden-xs">
            <h3>Реклама</h3>
        </section>
    </div>
@endsection

@section('popul')

@endsection

@section('content')
    <div class="col-lg-9 view_news">
        <h3>{{ $news['name'] }}</h3>

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

        {!! Html::image('img/news/' . $news['image'], $news['name']) !!}
        <div class="news_content">{!! $news['content'] !!}</div>
        <div class="clearfix"></div>
        <hr class="hr_home"/>
        <div class="clearfix"></div>
        <h6 class="pull-left">
            <i class="glyphicon glyphicon-send"></i> <b>Категория:</b> <a href="/news/category/{{ $news->category_news->id }}">{{ $news->category_news->name }}</a>
        </h6>
        <span class="clearfix"></span>
        <h6 class="pull-left">
            <i class="glyphicon glyphicon-calendar"></i> <b>Дата публикации:</b> {{ $news->created_at->format('Y-m-d') }} <br/>
        </h6>
        <span class="clearfix"></span>
        <h6 class="pull-left">
            <i class="glyphicon glyphicon-eye-open"></i> <b>Просмотры:</b> {{ $news['view'] }}
        </h6>
        <div class="clearfix"></div>
        <br/>
        <button class="pull-left" type="button" onclick="js:history.go(-1);returnFalse;" style="font-size: 14px;font-weight: bold;">Назад</button>

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
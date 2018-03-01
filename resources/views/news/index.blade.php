@extends('layouts.layout')

@section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="category_menu">
            <h3>Категории</h3>
            <ul class="list_category">
                @foreach($data['categoryNews'] as $categ)
                    <li><a href="/news/category/{{ $categ['id'] }}">{{ $categ['name'] }}</a></li>
                @endforeach
            </ul>
        </section>
        <section class="random_chanel hidden-sm hidden-xs">
            <h3>Рандомный канал</h3>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel_random" >
                <h4 title="{{ $data['random_channel']->name }}"><a target="_blank" href="{{ $data['random_channel']->url }}">{{  $data['random_channel']->name }}</a></h4>
                <div class="one_category">Категория:<a href="/category/{{  $data['random_channel']->category->id }}"> {{  $data['random_channel']->category->name }}</a></div>
                <hr class="one_category_hr" />
                {!! Html::image('img/channel/' .  $data['random_channel']->image,  $data['random_channel']->name) !!}
                <h5 title="{{  $data['random_channel']->description }}">{{ mb_strimwidth( $data['random_channel']->description, 0, 80, "...") }}</h5>
                <span class="clearfix"></span>
                <h6 class="pull-right">
                    <i class="glyphicon glyphicon-calendar"></i> {{ $data['random_channel']->created_at->format('Y-m-d') }} <br/>
                </h6>
                <h6 class="pull-left">
                    <i class="glyphicon glyphicon-user"></i> > {{ $data['random_channel']->subscribers }}
                </h6>
                <div class="clearfix"></div>
                <a target="_blank" href="{{ $data['random_channel']->url }}" class="url">Перейти на канал</a>
            </div>
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
    </div>
@endsection

@section('popul')
@endsection

@section('content')
    <div class="col-lg-9 od">
    <h3>Новости</h3>

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

    @if($data['news']->isNotEmpty())
        <div class="sort_news pull-left">
            <span>Сортировать по: </span>
            <select class="pull-right">
                <option>Дате</option>
                <option data-sort="date">Новые</option>
                <option data-sort="date_asc">Старые</option>
            </select>
            <div class="clearfix hidden-md hidden-lg hidden-sm"></div>
            <select class="pull-right">
                <option>Просмотрам</option>
                <option data-sort="view">Больше</option>
                <option data-sort="view_asc">Меньше</option>
            </select>
        </div>
        <div class="clearfix  hidden-md"></div>
    @foreach($data['news'] as $item)
        <div class="col-lg-4 col-md-4 col col-sm-6 col-xs-12 one_news">
            <h3><a href="/news/detail/{{ $item->id }}" title="{{ $item->name }}">{{ mb_strimwidth($item->name , 0, 55, "...")}}</a></h3>
            <div class="one_category">Категория:<a href="/news/category/{{ $item->category_news->id }}"> {{ $item->category_news->name }}</a></div>
            <hr class="one_category_hr" />
            {!! Html::image('img/news/' . $item->image , $item->name) !!}

            <div class="short_content">{!! mb_strimwidth($item->short_content, 0, 125, "...") !!}</div>
            <span class="clearfix"></span>
            <h6 class="pull-right">
                <i class="glyphicon glyphicon-calendar"></i> {{ $item->created_at->format('Y-m-d') }} <br/>
            </h6>
            <h6 class="pull-left">
                <i class="glyphicon glyphicon-eye-open"></i> Просмотры: @if($item->view > 99999) {{ $item->view = 99999 . '+'}} @else {{ $item->view }} @endif
            </h6>
            <div class="clearfix"></div>
            <a href="/news/detail/{{ $item->id }}" class="url">Подробнее</a>
        </div>
    @endforeach
        <div class="clearfix"></div>
        <?php echo $data['news']->render(); ?>
    @else
        <h4>Новостей нет.</h4>
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
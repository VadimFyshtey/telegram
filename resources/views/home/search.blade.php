@extends('layouts.layout')

@section('content')
    <div class="col-lg-9">
        <h2>Поиск: <?= $q ?></h2>
        @if($channels_search->isEmpty() || !($q) || !isset($channels_search) || count($channels_search) == 0)
            <h3>Поиск не дал результата.</h3>
        @else
            @foreach($channels_search as $channel)
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

        @endif
    </div>
@endsection
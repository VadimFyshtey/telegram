@extends('layouts.layout')

@section('sidebar')
@endsection

@section('popul')

@endsection

@section('content')
    <div class="col-lg-12 home">
        <div class="col-lg-6 col-md-6 ">
            <h2><a href="{{ route('channel') }}">Каналы телеграмм</a></h2>
            <button class="btn btn-lg add-class" data-toggle="modal" data-target="#myModal_channel" id="addChannel">Добавить канал в каталог</button>
        </div>
        <div class="col-lg-6 col-md-6 ">
            <h2><a href="{{ route('trade') }}">Биржа телеграмм</a></h2>
            <button class="btn btn-lg add-class" data-toggle="modal" data-target="#myModal_trade" id="addTrade">Добавить канал в биржу</button>
        </div>
        <div class="home_news">
            <span class="pull-left text_news_last">Последние новости</span>
            <span class="pull-right text_news hidden-xs"><a href="{{ route('news') }}">Все новости » </a></span>
            <div class="clearfix"></div>
            @if($last_news->isNotEmpty())
                @foreach($last_news as $news)
                    <div class="col-lg-4 col-md-6 col-xs-12">
                        {!! Html::image('img/news/' . $news->image , $news->name) !!}
                        <p><a href="/news/detail/{{ $news->id }}">{{ $news->name }}</a></p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('bottom_text')
<div class="container">
    <div class="col-lg-12">
        <div class="text ">
            <p>
                Телеграмм - это относительно новый мессенджер с очень большим будущем.
                Создатель телеграмм всем известный разработчик "Вконтакте" - Павел Дуров.
                Телеграмм позиционирует себя как полностью анонимный и защищенный мессенджер.
                В телеграмме нету рекламы, нету ничего лишнего, и с каждым днем этот мессенджер стает
                все лучше, а количество пользователей увеличивается каждую минуту.
                Так что сейчас самое время строить свой бизнес в телеграмме, можно это делать с помощь
                каналов или ботов. Наш сайт имеет цель популяризовать сам телеграмм и продвинуть ваши каналы,
                так же помочь людям которые ищут качественный контент. Добавляйте свой канал в наш каталог телеграмм каналов,
                или ищите себе канал по душе.
            </p>
        </div>
    </div>
</div>
@endsection
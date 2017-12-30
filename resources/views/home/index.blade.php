@extends('layouts.layout')

@section('popul')
@if($channels_popul->isNotEmpty())
<div class="col-lg-9">
<section class="popul">
    <h2>Популярные телеграмм каналы</h2>
    <div class="carusel">
        @foreach($channels_popul as $popul)
            <div class="one_popul">
                <h4 title="{{ $popul->name }}"><a target="_blank" href="{{ $popul->url }}">{{ mb_strimwidth($popul->name, 0, 80, "...") }}</a></h4>
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
</section>
</div>
@endif
@endsection

@section('content')
<div class="col-lg-9">
<h2>Все телеграм каналы</h2>
    @if($channels->isNotEmpty())
    @foreach($channels as $channel)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 one_chanel animate" >
            <div class="animateme"
                 data-when="enter"
                 data-from="0.5"
                 data-to="0"
                 data-opacity="0"
                 data-translatex="-200"
                 data-rotatez="90">
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
        </div>
    @endforeach
    <div class="clearfix"></div>
    <?php echo $channels->render(); ?>
    @else
        <h4>Каналов нет, <a href="" data-toggle="modal" data-target="#myModal" id="addChannel">добавте свой канал.</a></h4>
    @endif
</div>
@endsection
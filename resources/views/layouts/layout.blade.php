@include('layouts.section.header')
<div class="container">
    @include('layouts.section.modal')
    @section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="category_menu">
            <h3>Категории</h3>
            <ul class="list_category">
            @foreach($category as $categ)
                    <li><a href="/category/{{ $categ['id'] }}">{{ $categ['name'] }}</a></li>
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
    @show



        <section class="popul">
            @yield('popul')
        </section>

        <section class="all_chanel">
            @yield('content')
        </section>

    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <div class="text ">
            <p>
                Телеграмм - это относительно новый мессенджер с очень большим будущем.
                Создатель telegram всем известный разработчик Вконтакте Павел Дуров.
                Телеграмм позиционирует себя как полностью анонимный и защищенный мессенджер.
                В телеграмме нету рекламы, нету ничего лишнего, и с каждым днем этот мессенджер стает
                все лучше, а количество пользователей увеличивается каждую минуту.
                Так что сейчас самое время строить свой бизнес в телеграмме, можно это делать с помощь
                каналов или ботов. Наш сайт имеет цель популяризовать сам telegram и продвинуть ваши каналы,
                так же помочь людям которые ищут качественный контент.
            </p>
        </div>
    </div>
</div>
@include('layouts.section.footer')
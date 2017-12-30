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
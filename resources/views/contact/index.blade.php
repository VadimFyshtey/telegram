@extends('layouts.layout')
@section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="category_menu">
            <h3>Категории</h3>
            <ul class="list_category">
                @foreach($data['category'] as $category)
                    <li><a href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a></li>
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

@endsection

@section('content')
    <div class="col-lg-9">
        <h3>Контакты</h3>

        <div class="contact">
            {!! $data['contact']['content'] !!}
        </div>
        </div>
        <div class="col-lg-6">
            <div class="contact_form">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="col">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Ваш e-mail" required/>
                        </div>
                        <div class="col">
                            <label for="subject">Тема письма:</label>
                            <select  id="subject" name="subject" class="form-control">
                                <option value="Продвижение телеграмм каналов">Продвижение телеграмм каналов</option>
                                <option value="Проблемы с сайтом">Проблемы с сайтом</option>
                                <option value="Обновление информации">Обновление информации о канале</option>
                                <option value="Реклама">Реклама</option>
                                <option value="Пожелание">Пожелание</option>
                                <option value="Прочее">Прочее</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="text">Текст сообщения:</label>
                            <textarea name="text" id="text" class="form-control" placeholder="Опишите вашу проблему, пожелание или предложение" rows="10" required></textarea>
                        </div>
                        <br/>
                        <input type="submit" value="Отправить" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
        <br/>
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
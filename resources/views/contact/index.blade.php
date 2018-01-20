@extends('layouts.layout')

@section('popul')

@endsection

@section('content')
    <div class="col-lg-9">
        <h3>Контакты</h3>
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
        <br/>
        <div class="contact">
            {!! $contact['content'] !!}
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
                            <input type="email" id="email" name="email" class="form-control" placeholder="Ваш e-mail" />
                        </div>
                        <div class="col">
                            <label for="subject">Тема письма:</label>
                            <select  id="subject" name="subject" class="form-control">
                                <option value="Продвижение телеграмм каналов">Продвижение телеграмм каналов</option>
                                <option value="Проблемы с сайтом">Проблемы с сайтом</option>
                                <option value="Реклама">Реклама</option>
                                <option value="Пожелание">Пожелание</option>
                                <option value="Прочее">Прочее</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="text">Текст сообщения:</label>
                            <textarea name="text" id="text" class="form-control" placeholder="Опишите вашу проблему, пожелание или предложение" rows="10"></textarea>
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
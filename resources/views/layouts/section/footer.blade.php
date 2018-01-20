<footer>
    <div id="top"><i class="glyphicon glyphicon-chevron-up"></i></div>
    <div class="container">
        <h6 class="by">Сайт by <a href="{{ route('by88') }}">88</a></h6>
        <div class="col-lg-8 footer_text pull-left">
            <p>&copy; 2017 Каталог популярных телеграм каналов.</p>
        </div>
        <div class="col-lg-4 hidden-xs">
            <div class="footer_menu pull-right">
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('news') }}">Новости</a></li>
                    <li><a href="{{ route('service') }}">Услуги</a></li>
                    <li><a href="" data-toggle="modal" data-target="#myModal" id="addChannel">Добавить канал</a></li>
                    <li><a href="{{ route('contact') }}">Написать админу</a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>

<div class="hidden"></div>

<div class="loader">
    <div class="loader_inner"></div>
</div>
<!--[if lt IE 9]>
<script src="{{ asset('libs/html5shiv/es5-shim.min.js') }}"></script>
<script src="{{ asset('libs/html5shiv/html5shiv.min.js') }}"></script>
<script src="{{ asset('libs/html5shiv/html5shiv-printshiv.min.js') }}"></script>
<script src="{{ asset('libs/respond/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('libs/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('libs/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/scrollTop.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
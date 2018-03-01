<footer>
    <div id="top"><i class="glyphicon glyphicon-chevron-up"></i></div>
    <div class="container">
        <p class="by">{{ date('Y') }}<a href="{{ route('home') }}"> telegram-channel.ru</a> by <a href="{{ route('by88') }}">88</a></p>
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
<script src="{{ asset('libs/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/scrollTop.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
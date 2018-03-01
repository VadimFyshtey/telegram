@include('layouts.section.header')
<div class="container">
    @include('layouts.section.modal_channel')
    @include('layouts.section.modal_trade')
    @yield('sidebar')


    <div class="clearfix hidden-lg hidden-md"></div>
    <section class="all_chanel">
        @yield('content')
    </section>

    <div class="clearfix hidden-lg hidden-md"></div>
    <section class="popul">
        @yield('popul')
    </section>
</div>
</div>

@include('layouts.section.footer')
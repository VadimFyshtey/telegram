@include('layouts.section.header')
<div class="container">
    @include('layouts.section.modal_channel')
    @include('layouts.section.modal_trade')
    @yield('sidebar')
    
    <div class="clearfix hidden-lg hidden-md"></div>
        <section class="popul">
            @yield('popul')
        </section>
    <div class="clearfix hidden-lg hidden-md"></div>
        <section class="all_chanel">
            @yield('content')
        </section>
    </div>
<div class="clearfix"></div>
</div>
<br/>
<br/>

@yield('bottom_text')
@include('layouts.section.footer')
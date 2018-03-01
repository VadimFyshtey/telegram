@extends('layouts.layout')

@section('sidebar')
    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 ">
        <section class="trade_filter">
            <h3>Фильтр</h3>
            <hr class="hr_home"/>
            <div class="sort">
                <p>Сортировка &#9660;</p>
                <input type="radio" id="sortChoice1" data-id="1" name="price" value="asc">
                <label for="sortChoice1">цена по возрастанию</label>
                <div class="clearfix"></div>

                <input type="radio" id="sortChoice2" data-id="2" name="price" value="desc">
                <label for="sortChoice2">цена по убыванию</label>
                <div class="clearfix"></div>

                <input type="radio" id="sortChoice3" data-id="3" name="subscribers" value="asc">
                <label for="sortChoice3">подписчиков по возрастанию</label>
                <div class="clearfix"></div>

                <input type="radio" id="sortChoice4" data-id="4" name="subscribers" value="desc">
                <label for="sortChoice4">подписчиков по убыванию</label>
                <div class="clearfix"></div>

                <input type="radio" id="sortChoice5" data-id="5" name="created_at" value="desc">
                <label for="sortChoice5">сначало новые</label>
                <div class="clearfix"></div>

                <input type="radio" id="sortChoice6" data-id="6" name="created_at" value="asc">
                <label for="sortChoice6">сначало старые</label>
            </div>
            <hr class="one_category_hr"/>
            <div class="sort_category_filter">
                <p>Выберите категории &#9660;</p>
                @foreach($data['category'] as $category)
                    <input type="radio" id="categoryChoice{{ $category['id'] }}" name="category_id" value="{{ $category['id'] }}">
                    <label for="categoryChoice{{ $category['id'] }}">{{ $category['name'] }}</label>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            <div>
            </div>
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
    </div>
@endsection

@section('popul')
    @if($data['trades_top']->isNotEmpty())
        <div class="col-lg-9 center-class ">
            <h2>Лучшие каналы для вашей рекламы</h2>
            <hr class="hr_home"/>
            <table class="table table-hover  table-dark table_trade">
                <thead>
                <tr>
                    <th>Название канала</th>
                    <th>Подписчиков</th>
                    <th>Взаимопиар</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['trades_top'] as $trade_top)
                    <tr>
                        <th data-label="Название канала: ">
                            {!! Html::image('img/trade/' . $trade_top->image, $trade_top->name) !!}
                            <a href="trade/detail/{{ $trade_top->id }}">{{ mb_strimwidth($trade_top->name, 0, 50, "...") }}</a>
                            <br/>
                            <span class="trade_category">{{ $trade_top->category->name }}</span>
                        </th>
                        <td data-label="Подписчиков: ">{{ $trade_top->subscribers }}</td>
                        <td data-label="Взаимопиар: ">
                            @if($trade_top->pr === 1)
                                <span class="glyphicon glyphicon-ok"></span>
                            @elseif($trade_top->pr === 0)
                                <span class="glyphicon glyphicon-remove"></span>
                            @endif
                        </td>
                        <td data-label="Стоимость: ">{{ $trade_top->price }} руб.</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="link_service"><a href="{{ route('service') }}">Попасть сюда &#8593;</a></div>
            <hr class="hr_home"/>
        </div>
    @endif
@endsection

@section('content')
    <div class="col-lg-9 col-md-4 col col-sm-6 col-xs-12">
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


        <h3>Биржа телеграмм каналов</h3>
        @if($data['trades']->isNotEmpty())
            <div class="clearfix  hidden-md"></div>
            <table class="table table-hover table_trade">
                <thead>
                <tr>
                    <th>Название канала</th>
                    <th>Подписчиков</th>
                    <th>Взаимопиар</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['trades'] as $trade)
                    <tr>
                        <th data-label="Название канала: ">
                            {!! Html::image('img/trade/' . $trade->image, $trade->name) !!}
                            <a href="trade/detail/{{ $trade->id }}">{{ mb_strimwidth($trade->name, 0, 50, "...") }}</a>
                            <br/>
                            <span class="trade_category">{{ $trade->category->name }}</span>
                        </th>
                        <td data-label="Подписчиков: ">{{ $trade->subscribers }}</td>
                        <td data-label="Взаимопиар: ">
                            @if($trade->pr === 1)
                                <span class="glyphicon glyphicon-ok"></span>
                            @elseif($trade->pr === 0)
                                <span class="glyphicon glyphicon-remove"></span>
                            @endif
                        </td>
                        <td data-label="Стоимость: ">{{ $trade->price }} руб.</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix"></div>
            <?php echo $data['trades']->render(); ?>
        @else
            <h4>Каналов нет, <a href="" data-toggle="modal" data-target="#myModal_trade" id="addChannel">добавте свой канал.</a></h4>
        @endif


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
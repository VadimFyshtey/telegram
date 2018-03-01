@extends('layouts.layout_popul_bottom')

@section('sidebar')

@endsection

@section('content')
    <div class="detail_panel">
        <div class="col-lg-12 col-md-12 col col-sm-12 col-xs-12 detail_view">
            <div class="col-md-3">
                <div class="trade_img">{!! Html::image('img/trade/' . $data['trade']['image'], $data['trade']['name']) !!}</div>
                <hr/>
                <div class="subscribers_trade"><i class="glyphicon glyphicon-user"></i> {{ $data['trade']['subscribers'] }}</div>
                <hr/>
                <div class="subscribers_price">{{ $data['trade']['price'] }} руб.</div>
                <hr/>
                <div class="pr">
                    @if($data['trade']['pr'] === 1)
                        <b>Взаимопиар: </b><span class="subscribers_pr_yes">Да</span>
                    @else
                        <b>Взаимопиар: </b><span class="subscribers_pr_no">Нет</span>
                    @endif
                </div>
                <hr/>
                <div class="go_channel_trade" ><a href="{{ $data['trade']['url'] }}" target="_blank">Открыть канал</a></div>
            </div>
            <div class="col-md-9">
                <h3>{{ $data['trade']['name'] }}</h3>
                <hr/>
                <span><b>Описание:</b></span>
                <p>{{ $data['trade']['description'] }}</p>
                <hr/>
                <span><b>Условия размещения рекламы:</b></span>
                <p>{{ $data['trade']['conditions'] }}</p>
                <hr/>
                <span><b>Контакты:</b></span>
                @if($data['trade']['contact'])
                    @php $data['trade']['contact'] = trim($data['trade']['contact'], '@') @endphp
                    <a href="https://t.me/{{ $data['trade']['contact'] }}" target="_blank">{{ $data['trade']['contact'] }}</a>
                @else
                    <p>Зайдите в раздел информации о канале, для того, чтобы связаться с его автором.</p>
                @endif
                <hr/>
                <button class="pull-right" type="button" onclick="js:history.go(-1);returnFalse;" style="font-size: 14px;font-weight: bold; margin-top: 40px">Назад</button>
                <br/>
            </div>
           <div class="clearfix"></div>
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
    </div>
@endsection

@section('popul')
    @if($data['trades_top']->isNotEmpty())
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-class ">
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
            <div class="link_service">
                <a href="{{ route('service') }}">Попасть сюда &#8593;</a>
            </div>
            <hr class="hr_home"/>
        </div>
    @endif
@endsection
@extends('./layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/print_details.css') }}">
@section('style')

@stop
<div class="container">
    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb noprint">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文確認</li>
        </ol>
    </nav>

    <div class="form-group">
        <label for="exampleSelect1exampleFormControlSelect1">発注書の選択</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
  </div>

    @foreach($suppliers as $supplier)

        <!-- 発注書を出力するかどうか -->
        <?php $print = false ?>
        @foreach ($personal_orders as $personal_order)
            @if($supplier->id == \App\models\Supplie::find($personal_order->supplie_id)->supplier_id)
                <?php $print = true ?>
            @endif
        @endforeach

        @if($print)
            <div class="layout">
                <div class="day">{{ date("Y/m/d") }}</div>
                <div class="number">注文番号：{{ sprintf('%05d', $personal_sale->id). sprintf('%02d',$supplier->id) }}</div>

                <div class="header">
                    <div class="title">注　文　書</div>
                    <div class="sub-title">PURCHASE ORDER</div>
                </div>

                <div class="vender">
                    <div class="vendor-name"> {{$supplier->name}} </div>
                    <div class="vendor-rep">{{$supplier->person_charge}}　様</div>
                </div>

                <div class="office">
                    <div class="office-name">イートンちどり保育園</div>
                    <div class="postal-code">〒702-8024</div>
                    <div class="street-address">岡山市南区浦安南町425-1</div>
                    <div class="tel">TEL: 086-265-556</div>
                    <div class="fax">FAX: 086-265-5562</div>
                    <div class="rep">担当者：</div>
                </div>

                <div class="message"> 以下の通り発注いたします。</div>

                <table>
                    <thead>
                    <tr>
                        <th class="no">No</th>
                        <th class="supplie-name">品 番 • 品 名</th>
                        <th class="num">数 量</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $order_loop_index = 0;
                            $order_match = 0;
                        ?>
                        @foreach ($personal_orders as $personal_order)

                            <!-- 一致するオーダーが存在する -->
                            @if($supplier->id == \App\models\Supplie::find($personal_order->supplie_id)->supplier_id)
                                <td class="no">{{ $order_loop_index + 1 }}</td>
                                <td class="supplie-name">{{ \App\models\Supplie::find($personal_order->supplie_id)->name }}</td>
                                <td class="num">{{$personal_order->quantity}}</td>
                                </tr>
                                <?php  $order_match += 1;?>
                            @endif
                            <?php  $order_loop_index += 1;?>
                            <!-- オーダーのループ終了 -->
                            @if ($order_loop_index == count($personal_orders))
                                @for ($i = $order_match + 1; $i < 16; $i++)
                                    <td class="no">{{ $i }}</td>
                                    <td class="supplie-name"></td>
                                    <td class="num"></td>
                                    </tr>
                                @endfor
                            @endif

                        @endforeach
                    </tbody>
                </table>

                <div class="remarks">
                備考：
                </div>

            </div>
        @endif
    @endforeach

    <!-- 印刷ボタン -->
    <button type="button" class="btn btn-primary btn-block mt-5" onclick="window.print();">印　刷</button>


</div>

@section('script')
    <script src="{{ asset('js/print_details.js') }}"></script>
@stop

@stop


@extends('./layout')

@section('content')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/print_details.css') }}">
@stop

<div class="container">
    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb noprint">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
        </ol>
    </nav>

    @foreach($suppliers as $supplier)
        @if($loop->first)
        <div id="{{$supplier->supplier_id}}" class="layout">
        @else
        <div id="{{$supplier->supplier_id}}" class="layout">
        @endif
            <div class="day">{{ date("Y/m/d") }}</div>
            <div class="number">注文番号：{{ sprintf('%05d', $sale->id). sprintf('%02d',$supplier->supplier_id) }}</div>

            <div class="header">
                <div class="title">注　文　書</div>
                <div class="sub-title">PURCHASE ORDER</div>
            </div>

            <div class="vender">
                <div class="vendor-name">{{$supplier->supplier_name}}</div>
                <div class="vendor-rep">{{$supplier->supplier_person_charge}}　様</div>
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

                    <?php $matches = 0 ?>
                    @foreach($skus as $sku)
                        @if($sku->supplier_id == $supplier->supplier_id)
                            <?php $matches += 1 ?>
                            <td class="no">{{ $matches }}</td>
                            <td class="supplie-name">
                                {{ $sku->supplie_name }}
                                @if($sku->size != 'なし')
                                    {{ $sku->size }}
                                @endif
                                @if($sku->color != 'なし')
                                    {{ $sku->color }}
                                @endif
                            </td>
                            <td class="num">{{ \App\models\Order::join('supplies', 'supplie_id', 'supplies.id')
                                ->where('supplies.supplier_id', '=', $supplier->supplier_id)
                                ->where('sku_id', '=',$sku->sku_id)
                                ->sum("quantity")
                            }}
                            </td>
                            </tr>
                        @endif

                        @if($loop->last)
                            @if($matches < 15)
                                @foreach(range($matches,15) as $i)
                                <td class="no">{{ $i }}</td>
                                <td class="supplie-name"></td>
                                <td class="num"></td>
                                </tr>
                                @endforeach
                            @endif
                        @endif

                    @endforeach

                </tbody>
            </table>

            <div class="remarks">
            備考：
            </div>

        </div>

    @endforeach

    <!-- 印刷ボタン -->
    <button type="button" class="btn btn-primary btn-block mt-5 noprint" onclick="window.print();">印　刷</button>

</div>

@section('script')
    <script src="{{ asset('js/print_details.js') }}"></script>
@stop

@stop


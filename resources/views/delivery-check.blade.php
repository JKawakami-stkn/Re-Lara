@extends('./layout')

@section('content')

{{--$sale--}}
{{--$kid--}}
{{--$orders--}}

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="">(販売会名)</a></li>
            <li class="breadcrumb-item"><a href="">引き渡し</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>

    @if($orders)
    <form action="{{ route('delivery-check.store', [$sale->id, $kid->KIDS_ID]) }}" method="post" onsubmit="return checkbox_check()">
        {{ csrf_field() }}
        <!-- メディアオブジェクト -->
        @foreach($orders as $order)
        <div class="media mt-4 pb-4 border-bottom">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/'.\App\models\Supplie::find($order->supplie_id)->img_path) }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">{{ \App\models\Supplie::find($order->supplie_id)->name }}</h5>
                <p class="mt-3 mb-0">サイズ：{{$sku_data[$order->sku_id]["size"]}}</p>
                <p class="m-0">カラー：{{$sku_data[$order->sku_id]["color"]}}</p>
                <p class="m-0">数　量：{{ $order->quantity }}</p>
            </div>
            <div class="mt-5 mb-3">
                <p>
                    <input type="checkbox" id="cb-{{$loop->index}}" />
                    <label for="cb-{{$loop->index}}"></label>
                </p>
            </div>
        </div>
        @endforeach
        <div class="mt-5 mb-3">
             <button type="submit"class="btn btn-primary btn-block" id="confirm" onclick="window.onbeforeunload=null">送信する</button>
        </div>
    </form>
    @else
        <p>注文された商品がありません.。</p>
    @endif

</div>

<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
</style>
@stop

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
<script src="{{ asset('js/multiple_checkbox_checker.js') }}"></script>
@stop

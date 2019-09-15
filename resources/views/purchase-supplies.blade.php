@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('purchase-target', [$sale_name, $target]) }}">購入</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$target}}</li>
        </ol>
    </nav>


    <!-- メディアオブジェクト -->
    <div class="media mt-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            ￥0,000
            <p class="mt-4 text-danger">購入状態：未購入</p>
        </div>
    </div>

    <div class="media mt-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/fashion_tsuugakubou_hat.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">帽子</h5>
            ￥0,000
            <p class="mt-4 text-success">購入状態：購入済み</p>
        </div>
    </div>

</div>

<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
</style>
@stop


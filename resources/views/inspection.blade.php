@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">検品</li>
        </ol>
    </nav>


    <!-- メディアオブジェクト -->
    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            <p class="mt-3 mb-0">サイズ：80</p>
            <p class="m-0">カラー：</p>
            <p class="m-0">数　量：10</p>
        </div>
        <div class="mt-5 mb-3">
           <form action="#">
                <p>
                    <input type="checkbox" id="cb3" />
                    <label for="cb3"></label>
                </p>
            </form>
        </div>
    </div>

    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            <p class="mt-3 mb-0">サイズ：90</p>
            <p class="m-0">カラー：</p>
            <p class="m-0">数　量：20</p>
        </div>
        <div class="mt-5 mb-3">
           <form action="#">
                <p>
                    <input type="checkbox" id="cb1" />
                    <label for="cb1"></label>
                </p>
            </form>
        </div>
    </div>

    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/fashion_tsuugakubou_hat.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">帽子</h5>
            <p class="mt-3 mb-0">サイズ：90</p>
            <p class="m-0">カラー：</p>
            <p class="m-0">数　量：20</p>
            <p class="pt-0 text-success">担当者：〇〇　〇〇</p>
        </div>
        <div class="mt-5 mb-3">
           <form action="#">
                <p>
                    <input type="checkbox" id="cb2" checked="checked" disabled="disabled"/>
                    <label for="cb2"></label>
                </p>
            </form>
        </div>
    </div>

     <div class="mt-5 mb-3">
        <a class="btn btn-primary btn-block" href="{{ route('sale-menu', $sale_name) }}" role="button">確　　定</a>
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


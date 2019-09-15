@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('delivery-target', [$sale_name, $target]) }}">引き渡し</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$target}}</li>
        </ol>
    </nav>


    <!-- メディアオブジェクト -->
    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            <p class="mt-3 mb-0">サイズ：</p>
            <p class="m-0">カラー：</p>
            <p class="m-0">数　量：</p>
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
            <p class="mt-0">サイズ：</p>
            <p class="mt-0">カラー：</p>
            <p class="mt-0">数　量：</p>
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
        <a class="btn btn-primary btn-block" href="{{ route('sale-menu', $sale_name) }}" role="button" onclick="window.onbeforeunload=null"> 
            確　　定
        </a>
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

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
@stop


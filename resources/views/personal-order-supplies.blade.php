@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>


    <!-- メディアオブジェクト -->
    <a class="text-decoration-none" href="">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/spplie_imgs/taisougi.png') }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">体操服</h5>
                <p>￥0,000</p>
                <p class="mt-4 text-danger">購入状態：未購入</p>
            </div>
        </div>
    </a>

    <a class="text-decoration-none" href="">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/spplie_imgs/fashion_tsuugakubou_hat.png') }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">帽子</h5>
                ￥0,000
                <p class="mt-4 text-success">購入状態：購入済み</p>
            </div>
        </div>
    </a>

    <div class="mt-5 mb-3">
        <a class="btn btn-primary btn-block" href="">
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



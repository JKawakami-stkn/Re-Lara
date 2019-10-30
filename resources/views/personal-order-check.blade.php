@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('personal-orders.show') }}">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文確認</li>
        </ol>
    </nav>
    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('storage/spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            <p class="mt-3 mb-0">サイズ：80</p>
            <p class="m-0">カラー：</p>
            <p class="m-0">数　量：10</p>
        </div>
    </div>


</div>


@stop


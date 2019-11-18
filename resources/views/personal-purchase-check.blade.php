@extends('./layout')

@section('content')

<div class="container" >



    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文確認</li>
        </ol>
    </nav>
    @foreach($personal_orders as $personal_order)
    {{ \App\models\Supplie::withTrashed()->find($personal_order->supplie_id) }}a?
    <div class="media mt-4 pb-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('storage/'.\App\models\Supplie::withTrashed()->find($personal_order->supplie_id)->img_path) }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">{{ \App\models\Supplie::withTrashed()->find($personal_order->supplie_id)->name }}</h5>
            <p class="mt-3 mb-0">サイズ：{{$personal_sku_data[$personal_order->sku_id]["size"]}}</p>
            <p class="m-0">カラー：{{$personal_sku_data[$personal_order->sku_id]["color"]}}</p>
            <p class="m-0">数　量：{{ $personal_order->quantity }}</p>
        </div>
    </div>
    @endforeach


</div>


@stop

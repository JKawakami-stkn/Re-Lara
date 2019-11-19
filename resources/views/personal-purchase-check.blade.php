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

    @if(!$personal_orders->isEmpty())
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

            <a href="" class="align-self-end" data-toggle="modal" data-target="#ModalLong">
                <button type="button" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </button>
            </a>
        </div>
        @endforeach

        <form action="{{ route('personal-purchase-check.store', $personal_sale->id) }}" method="post">
            @csrf
            <div class="mt-5 mb-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="window.onbeforeunload=null">確　　定</button>
            </div>
        </form>

    @else
        <p>カートに商品はありません</p>
        <a href="{{ route('personal-purchase-supplies.show', $personal_sale->id) }}">用品一覧画面へ</a>
    @endif
</div>


@stop

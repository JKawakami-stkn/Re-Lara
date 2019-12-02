@extends('./layout-outside')

@section('content')

<div class="container" >
    @if(!$orders->isEmpty())
        @foreach($orders as $order)
        <!-- {{ \App\models\Supplie::withTrashed()->find($order->supplie_id) }} -->
        <div class="media mt-4 pb-4 border-bottom">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/'.\App\models\Supplie::withTrashed()->find($order->supplie_id)->img_path) }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">{{ \App\models\Supplie::withTrashed()->find($order->supplie_id)->name }}</h5>
                <p class="mt-3 mb-0">サイズ：{{$sku_data[$order->sku_id]["size"]}}</p>
                <p class="m-0">カラー：{{$sku_data[$order->sku_id]["color"]}}</p>
                <p class="m-0">数　量：{{ $order->quantity }}</p>
            </div>

            <div class="align-self-end">
                <form action="{{ route('parent-cart.delete', [$sale->id, $token, $order->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </div>

        </div>
        @endforeach

        <form action="{{ route('parent-cart.store', [$sale->id, $token]) }}" method="post">
            @csrf
            <div class="mt-5 mb-3">
                <button type="submit" class="btn btn-primary btn-block" onclick="window.onbeforeunload=null">確　　定</button>
            </div>
        </form>

    @else
        <p>カートに商品はありません</p>
        <a href="{{ route('parent-input-supplie-list.show', [$sale->id, $token]) }}">用品一覧画面へ</a>
    @endif
</div>


@stop

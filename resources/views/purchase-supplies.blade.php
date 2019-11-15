@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$target}}</li>
        </ol>
    </nav>


    <!-- メディアオブジェクト -->
    @foreach($supplies as $supplie)
    <a class="text-decoration-none" href="{{ route('purchase-supplie', [$sale->id, $target, $supplie->id]) }}">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/spplie_imgs/taisougi.png') }}">
            <div class="media-body pl-2">
            <h5 class="mt-0">{{$supplie->name}}</h5>
            <p>{{$supplie->price}}</p>
                <p class="mt-4 _text-danger">購入状態：未購入</p>
            </div>
        </div>
    </a>
    @endforeach

    <div class="mt-5 mb-3">
        @csrf
        <a class="btn btn-primary btn-block" href="{{ route('sale-menu', $sale->name) }}">
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



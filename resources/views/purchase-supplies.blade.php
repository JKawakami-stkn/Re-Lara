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

    <a href="{{ route('order-status.show', [ $sale->id, $target ]) }}">
        <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">
            <i class="fas fa-shopping-cart"></i>
        </button>
    </a>
    <!-- メディアオブジェクト -->
    @foreach($supplies as $supplie)
    <a class="text-decoration-none" href="{{ route('purchase-supplie', [$sale->id, $target, $supplie->id]) }}">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/spplie_imgs/taisougi.png') }}">
            <div class="media-body pl-2">
            <h5 class="mt-0">{{$supplie->name}}</h5>
            <p>{{$supplie->price}}</p>
                <p class="mt-4 _text-danger">{{$purchasesupplies->tablecheck($supplie->id,$sale->id,$target)}}</p>
            </div>
        </div>
    </a>
    @endforeach

</div>

<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
</style>
@stop

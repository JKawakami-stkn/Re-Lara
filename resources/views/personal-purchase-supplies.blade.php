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
    <!--
    {{ $supplies }}
    <br> <br>
    {{ $personal_sale }}
    -->
    <!-- メディアオブジェクト -->
    @foreach($supplies as $supplie)
    <a class="text-decoration-none" href="{{ route('personal-purchase-supplie.show', [$personal_sale->id, $supplie->id]) }}">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/'.$supplie->img_path) }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">{{ $supplie->name }}</h5>
                <p>￥{{ number_format($supplie->price) }}</p>
                <!-- {{ \App\models\Personal_order::where('personal_sale_id', $personal_sale->id)->where('supplie_id', $supplie->id)->get() }} -->
                @if( \App\models\Personal_order::where('personal_sale_id', $personal_sale->id)->where('supplie_id', $supplie->id)->get()->isEmpty() )
                    <p class="mt-4 text-danger">状態：未入力</p>
                @else
                    <p class="mt-4 text-success">状態：入力済み</p>
                @endif
            </div>
        </div>
    </a>
    @endforeach
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



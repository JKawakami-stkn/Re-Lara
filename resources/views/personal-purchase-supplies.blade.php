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
    
    <a href="{{ route('personal-purchase-check.show', $personal_sale->id) }}">
        <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">
            <i class="fas fa-shopping-cart"></i>
        </button>
    </a>

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
                    <!--<p class="mt-4 _text-danger">状態：未入力</p>-->
                @else
                    <!--<p class="mt-4 text-success">状態：入力済み</p>-->
                @endif
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



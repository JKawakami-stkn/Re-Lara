@extends('./layout-outside')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            
        </ol>
    </nav>
    
    <a href="{{ route('parent-cart.show', [$sale->id, $token]) }}">
        <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">
            <i class="fas fa-shopping-cart"></i>
        </button>
    </a>
    
    <!-- メディアオブジェクト -->
    @foreach($supplies as $supplie)
    <a class="text-decoration-none" href="{{ route('parent-input-supplie.show', [$sale->id, $token, $supplie->id]) }}">
        <div class="media mt-4 pb-4 border-bottom text-dark">
            <img class="card-img-top img-thumbnail" src="{{ asset('storage/'.$supplie->img_path) }}">
            <div class="media-body pl-2">
                <h5 class="mt-0">{{ $supplie->name }}</h5>
                <p>￥{{ number_format($supplie->price) }}</p>
                @if(!\App\models\Order::where('sale_id', $sale->id)->where('supplie_id', $supplie->id)->where('kids_id', $target)->get()->isEmpty() )
                    <p class="mt-4 text-success">カートに入っています</p>
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



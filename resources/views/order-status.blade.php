@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale->id) }}">{{ $sale->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">購入</li>
            </ol>
     </nav>

     <!-- 園児の名前を表示-->
    <p>{{$kid->KIDS_NM_KJ}}</p>

    <!-- 用品を表示-->
    @foreach ($orders as $order)
    <p>{{$order->name}}</p>
    @endforeach
    

</div>

@stop

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
  

    <div class="accordion" id="accordion2" role="tablist">
            <div class="card">
                <div class="card-header" role="tab" id="heading1" style="background-color:#c9c9c9;">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> {{$kid->KIDS_NM_KJ}} </a>
                    </h5>
                </div>
                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1" _data-parent="#accordion2">
                    <div class="card-body">
                        <table class="table">
                            <!-- 園児の名前を表示-->
                            <caption>{{$kid->KIDS_NM_KJ}}の注文</caption>
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th scope="col">用品</th>
                                    <th scope="col">数量</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <!-- 用品を表示-->
                                    @foreach ($orders as $order)
                                <tr>
                                    <th>・</th>
                                    <td>{{$order->name}}</td>
                                    <td>810</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    

</div>

@stop

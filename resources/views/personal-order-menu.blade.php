@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('personal-orders.show') }}">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文No</li>
        </ol>
    </nav>

    <div class="card _border-0 mb-4">
  <div class="card-body">
    <h4>(個別注文ID)の詳細</h4>
    <br>
    <p>　注文者：</p>
    <p>　状　況：</p>
    <p>　期　日：</p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('personal-purchase-supplies.show', $personal_sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/purchase.png') }}" data-toggle="tooltip" title="入力">
                </div>
             </a>
        </div>

        <div class="col-4">
            <a href="{{ route('personal-purchase-check.show', $personal_sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/purchase_confirmation.png') }}" data-toggle="tooltip" title="注文状況確認">
                </div>
            </a>
        </div>

        <div class="col-4">
            <a href="">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/delivery.png') }}" data-toggle="tooltip" title="引き渡し">
                </div>
            </a>
        </div>

    </div>

    <div class="row">



        <div class="col-3">
            <a href="">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/print.png') }}" data-toggle="tooltip" title="印刷">
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="{{route('personal-order-edit.show', $personal_sale->id)}}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" alt="カードの画像" data-toggle="tooltip" title="情報編集">
                </div>
            </a>
        </div>

    </div>
</div>




</div>


@stop

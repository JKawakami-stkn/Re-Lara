@extends('./layout')

@section('content')

<div class="container">

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sales-list') }}">販売会確認</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $sale_name }}</li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
  <div class="card-body">
    <h4>{{ $sale_name }}の詳細</h4>
    <br>
    <p>　期日：</p>
    <p>　対象：</p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/purchase.png') }}" data-toggle="tooltip" title="購入">
                </a>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/check.png') }}" data-toggle="tooltip" title="検品">
                </a>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/delivery.png') }}" data-toggle="tooltip" title="引き渡し">
                </a>
            </div>
        </div>

    </div>

    <div class="row">
    
        <div class="col-3">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/purchase_confirmation.png') }}" data-toggle="tooltip" title="注文状況確認">
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/print.png') }}" data-toggle="tooltip" title="印刷">
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/dl.png') }}" data-toggle="tooltip" title="ダウンロード">
                </a>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <a href="">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" alt="カードの画像" data-toggle="tooltip" title="情報編集">
                </a>
            </div>
        </div>

    </div>
</div>

@stop


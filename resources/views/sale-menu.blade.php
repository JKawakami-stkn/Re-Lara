@extends('./layout')

@section('content')

<div class="container">

<!-- 戻るボタン -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('sales') }}">
                <i class="fas fa-arrow-left"></i> 戻 る
            </a>
        </li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
  <div class="card-body">
    <h4>{{ $sale->name }}の詳細</h4>
    <br>
    <p>　期日：{{ $sale->deadline }}</p>
    <p>　対象：
    <div class="ml-5">
        @foreach($groups as $group)
            {{ $group }}<br>
        @endforeach
        </div>
    </p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('purchase-target', $sale->id) }} ">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/purchase.png') }}" data-toggle="tooltip" title="購入">
                </div>
             </a>
        </div>

        <!--
        <div class="col-4">
            <a href="{{ route('inspection', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/check.png') }}" data-toggle="tooltip" title="検品">
                </div>
            </a>
        </div>
        -->
        <div class="col-4">
            <a href="{{ route('orders-status', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/purchase_confirmation.png') }}" data-toggle="tooltip" title="注文状況確認">
                </div>
            </a>
        </div>

        <div class="col-4">
            <a href="{{ route('delivery-target', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/delivery.png') }}" data-toggle="tooltip" title="引き渡し">
                </div>
            </a>
        </div>

    </div>

    <div class="row">

        <div class="col-3">
            <a href="{{ route('print.show', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/print.png') }}" data-toggle="tooltip" title="印刷">
                </div>
            </a>
        </div>

        <!--
        <div class="col-3">
            <a href="">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/dl.png') }}" data-toggle="tooltip" title="ダウンロード">
                </div>
            </a>
        </div>
        -->

        <div class="col-3">
            <a href="{{ route('sale-editStore', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" alt="カードの画像" data-toggle="tooltip" title="情報編集">
                </div>
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('mail-target-type.show', $sale->id) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/mail.png') }}" alt="カードの画像" data-toggle="tooltip" title="メール送信">
                </div>
            </a>
        </div>

    </div>
</div>

@stop


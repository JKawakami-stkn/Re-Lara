@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">メニュー</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('sales') }}">
                <h5 class="card-title">一括注文</h5>
                <p class="card-text">かくにんできるよ！！</p>
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('personal-orders.show') }}">
                <h5 class="card-title">個別注文</h5>
                <p class="card-text">未実装！！</p>
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('suppliers.show') }}">
                <h5 class="card-title">取引先</h5>
                <p class="card-text">かくにんできるよ！！</p>
            </a>
        </div>
    </div>
</div>

@stop


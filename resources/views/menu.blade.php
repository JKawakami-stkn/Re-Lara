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
                <h5 class="card-title">物品販売</h5>
                <p class="card-text">かくにんできるよ！！</p>
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('suppliers') }}">
                <h5 class="card-title">取引先</h5>
                <p class="card-text">かくにんできるよ！！</p>
            </a>
        </div>
    </div>
</div>

@stop


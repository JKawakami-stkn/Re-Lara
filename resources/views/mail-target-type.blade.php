@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">メニュー</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('mail-all-confirm.show', $sale->id) }}">
                <h5 class="card-title">全ての対象者</h5>
                <p class="card-text">対象者全員にメールを送信します</p>
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('mail-class-select.show', $sale->id) }}">
                <h5 class="card-title">組を選択</h5>
                <p class="card-text">組を指定してメールを送信します</p>
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('mail-personal-select.show', $sale->id) }}">
                <h5 class="card-title">個人を選択</h5>
                <p class="card-text">個人を指定してメールを送信します</p>
            </a>
        </div>
    </div>
</div>

@stop


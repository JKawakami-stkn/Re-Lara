@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">販売会確認</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="card">
        <h5 class="card-header text-center">テスト販売会</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                期　日：
            </p>
            <a href="{{ route('sale-menu', 'テスト販売会') }}" class="btn btn-primary btn-block" style="width:100%;">選択する</a>
        </div>
    </div>
</div>

@stop


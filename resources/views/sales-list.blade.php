@extends('./layout')

@section('content')

<button type="button" class="btn btn-primary rounded-circle p-0 position-fixed" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">物品販売</li>
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


@extends('./layout')

@section('content')

<a href="{{ route('sale-registration') }}">
    <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
</a>

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
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


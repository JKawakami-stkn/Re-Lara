@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:white; border-bottom:solid 1px #e3e3e3; padding:8px;">
            <li class="breadcrumb-item active" aria-current="page">メニュー</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="card">
        <div class="card-body">
            <a href="{{ route('o-list') }}">
                <h5 class="card-title">販売会確認</h5>
                <p class="card-text">かくにんできるよ！！</p>
            </a>
        </div>
    </div>
</div>

@stop


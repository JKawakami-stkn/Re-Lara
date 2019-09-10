@extends('./layout')

@section('content')

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="{{ route('menu') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sample</li>
    </ol>
</nav>

<div class="container">
    <!-- ページタイトル -->
    <h1 class="jumbotron-heading" style="border-bottom: solid 1px;">TEST</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>

    <!-- アラート -->
    <div class="alert alert-success" role="alert">
        A simple success alert—check it out!
    </div>

    <div class="alert alert-danger" role="alert">
        A simple info alert—check it out!
    </div>

</div>

<!-- カード -->
<div class="container" >
    <div class="card">
        <h5 class="card-header text-center">
            販売会名
        </h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                期　日：
            </p>
            <a href="#" class="btn btn-outline-primary" style="width:100%;">選択する</a>
        </div>
    </div>
</div>


<!-- 画像のみカード -->
<div class="container" >
    <div class="row">

        <div class="col-4">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/purchase.png') }}" data-toggle="tooltip" title="購入">
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/check.png') }}" data-toggle="tooltip" title="検品">
            </div>
        </div>

        <div class="col-4">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/delivery.png') }}" data-toggle="tooltip" title="引き渡し">
            </div>
        </div>

    </div>

    <div class="row">
    
        <div class="col-3">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/purchase_confirmation.png') }}" data-toggle="tooltip" title="注文状況確認">
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/print.png') }}" data-toggle="tooltip" title="印刷">
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/dl.png') }}" data-toggle="tooltip" title="ダウンロード">
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <img class="card-img" src="{{ asset('img/edit.png') }}" alt="カードの画像" data-toggle="tooltip" title="情報編集">
            </div>
        </div>

    </div>
</div>

@stop


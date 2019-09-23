@extends('./layout')

@section('content')

<div class="container">

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
        <li class="breadcrumb-item"><a href="{{ route('suppliers.show') }}">取引先</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $supplier->name }}</li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
    <h4 class="mt-3 ml-2">{{ $supplie->name }}の詳細</h4>
    <img class="card-img-top mx-auto border" src="{{ asset('storage/'.$supplie->img_path) }}">
    <div class="card-body">
        <br>
        <p>　価格：{{ $supplie->price }}</p>
        <p>　サイズ：{{ $supplier->name }}</p>
        <p>　カラー：{{ $supplier->name }}　対応：</p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('supplier-edit.show', $supplier) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" data-toggle="tooltip" title="編集">
                </div>
            </a>
        </div>


    </div>
    
</div>

@stop


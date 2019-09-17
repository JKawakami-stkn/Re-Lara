@extends('./layout')

@section('content')

<div class="container">

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
        <li class="breadcrumb-item"><a href="{{ route('suppliers') }}">取引先</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $supplier_name }}</li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
  <div class="card-body">
    <h4>{{ $supplier_name }}の詳細</h4>
    <br>
    <p>　期日：</p>
    <p>　対象：</p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('supplies', $supplier_name) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/supplies.png') }}" data-toggle="tooltip" title="取扱商品">
                </div>
             </a>
        </div>

        <div class="col-4">
            <a href="{{ route('supplier-edit', $supplier_name) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" data-toggle="tooltip" title="編集">
                </div>
            </a>
        </div>


    </div>
    
</div>

@stop


@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('purchase-target', [$sale_name, $target]) }}">購入</a></li>
            <li class="breadcrumb-item"><a href="{{ route('purchase-supplies', [$sale_name, $target]) }}">商品</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$supplie}}</li>
        </ol>
    </nav>

    <p>企業名</p>
    <p>{{$supplie}}</p>
    

    <img src="{{ asset('spplie_imgs/taisougi.png') }}" height="250px" class="img-fluid mx-auto d-block">

    <div class="form-group">
        <label>サイズ</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>

    <div class="form-group">
        <label>カラー</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>

    <p class="mt-5 mb-5">価格：0,000</p>

    <p>数量</p>
    <div class="input-group">
        <input type="text" class="form-control" aria-label="ドル金額（小数点以下2桁）">
        <div class="input-group-append">
            <span class="input-group-text">個</span>
        </div>
    </div>

    

    <div class="mt-5 mb-3">
        <!-- <button type="submit" class="btn btn-primary btn-block">選　　択</button> -->
        <a class="btn btn-primary btn-block" href="{{ route('purchase-supplies', [$sale_name, '例之太郎']) }}" role="button" onclick="window.onbeforeunload=null">
            確　　定
        </a>
    </div>
</div>

<style>
    .img-fluid {
        _width: 250px;
        height: 250px;
        object-fit: cover;
    }
</style>
@stop

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
@stop



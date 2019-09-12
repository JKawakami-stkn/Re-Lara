@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales-list') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">購入</li>
        </ol>
    </nav>

    <div class="row mt-4 mb-4 pb-4 border-bottom">
        <div class="form-group col-5">
            <label>組</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group col-7">
            <label>名前</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <!-- メディアオブジェクト -->
    <div class="media mt-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/taisougi.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">体操服</h5>
            ￥0,000
            <div class="row">

                <div class="form-group col-3">
                    <label>サイズ</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="form-group col-3">
                    <label>カラー</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="form-group col-3">
                    <label>数量</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="media mt-4 border-bottom">
        <img class="card-img-top img-thumbnail" src="{{ asset('spplie_imgs/fashion_tsuugakubou_hat.png') }}">
        <div class="media-body pl-2">
            <h5 class="mt-0">帽子</h5>
            ￥0,000
            <div class="row">

                <div class="form-group col-3">
                    <label>サイズ</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="form-group col-3">
                    <label>カラー</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="form-group col-3">
                    <label>数量</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

            </div>
        </div>
    </div>

</div>

<style>
    .card-img-top {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }
</style>
@stop


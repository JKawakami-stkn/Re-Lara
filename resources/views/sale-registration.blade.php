@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item active" aria-current="page">販売会登録</li>
        </ol>
    </nav>

    <!-- ページタイトル -->
    <form>
        <div class="form-group">
            <label for="sale_name">販売会の名前</label>
            <input class="form-control" id="sale_name" placeholder="例：">
        </div>

        <p class="mb-2">対象選択</p>
        <div class="form-group form-check border rounded">

            <input type="checkbox" class="form-check-input" id="6">
            <label class="form-check-label mt-2 mb-1 mr-3" for="6">対象組</label>

            <input type="checkbox" class="form-check-input" id="7">
            <label class="form-check-label mt-2 mb-1 mr-3" for="7">対象組</label>

            <input type="checkbox" class="form-check-input" id="8">
            <label class="form-check-label mt-2 mb-1 mr-3" for="8">対象組</label>

            <input type="checkbox" class="form-check-input" id="9">
            <label class="form-check-label mt-2 mb-1 mr-3" for="9">対象組</label>

            <input type="checkbox" class="form-check-input" id="10">
            <label class="form-check-label mt-2 mb-1 mr-3" for="10">対象組</label>

        </div>


        <p class="mb-2">用品選択</p>
        <div class="form-group form-check border rounded">

            <input type="checkbox" class="form-check-input" id="1">
            <label class="form-check-label mt-2 mb-1 mr-3" for="1">商品名</label>

            <input type="checkbox" class="form-check-input" id="2">
            <label class="form-check-label mt-2 mb-1 mr-3" for="2">商品名</label>

            <input type="checkbox" class="form-check-input" id="3">
            <label class="form-check-label mt-2 mb-1 mr-3" for="3">商品名</label>

            <input type="checkbox" class="form-check-input" id="4">
            <label class="form-check-label mt-2 mb-1 mr-3" for="4">商品名</label>

            <input type="checkbox" class="form-check-input" id="5">
            <label class="form-check-label mt-2 mb-1 mr-3" for="5">商品名</label>

        </div>

        <!-- <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">送信する</button> -->
        <a class="btn btn-primary" href="{{ route('sales') }}" role="button" onclick="window.onbeforeunload=null">送信する</a>
    </form>

</div>

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
@stop

@stop


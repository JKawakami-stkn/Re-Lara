@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">取引先一覧</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier-menu', $supplier_name) }}">{{$supplier_name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">取引先編集</li>
        </ol>
    </nav>

    <!-- ページタイトル -->
    <form>
        <div class="form-group">
            <label for="sale_name">取引先の名前</label>
            <input class="form-control" id="sale_name" placeholder="例：">
        </div>

        <div class="form-group">
            <label for="sale_name">取引先の担当者</label>
            <input class="form-control" id="sale_name" placeholder="例：">
        </div>

        <p>取引先の電話番号</p>
        <div class="input-group mb-3" id="inputGroup">
                <select class="custom-select col-3" id="inputGroupSelect">
                    <option selected>0120</option>
                    <option value="">050</option>
                    <option value="etc">その他</option>
                </select>
            <input type="text" class="form-control col-9" placeholder="" aria-label="" aria-describedby="addon-wrapping">
        </div>

        <p>取引先の住所</p>
        <div class="border rounded p-2 mb-4">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputZip">郵便番号</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">都道府県</label>
                    <select id="inputState" class="form-control">
                        <option selected>選択...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">市町村</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">番地以下</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1丁目2番3号">
            </div>
        </div>



        <!-- <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">送信する</button> -->
        <a class="btn btn-primary" href="{{ route('suppliers') }}" role="button" onclick="window.onbeforeunload=null">送信する</a>
    </form>

</div>

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>

<script>
    $('#inputGroupSelect').change(function() {
        if($('option:selected').val() == 'etc'){
            $('#inputGroup').html('<input type="text" class="form-control col-3" placeholder="" aria-label="" aria-describedby="addon-wrapping">' +
                '<input type="text" class="form-control col-9" placeholder="" aria-label="" aria-describedby="addon-wrapping">');
        }
    })
</script>
@stop

@stop


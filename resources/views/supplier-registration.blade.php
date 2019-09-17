@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('suppliers.show') }}">取引先</a></li>
            <li class="breadcrumb-item active" aria-current="page">取引先登録</li>
        </ol>
    </nav>

    <!-- ページタイトル -->
    <form action="{{ route('supplier-registration.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="sale_name">取引先の名前</label>
            <input class="form-control" id="name" name="name" placeholder="例：">
        </div>

        <div class="form-group">
            <label for="sale_name">取引先の担当者</label>
            <input class="form-control" id="person_charge" name="person_charge" placeholder="例：">
        </div>

        <p>取引先の電話番号</p>
        <div class="input-group mb-3" id="inputGroup">
                <select class="custom-select col-3" id="phone_number_1" name="phone_number_1">
                    <option selected>0120</option>
                    <option>050</option>
                    <option value="etc">その他</option>
                </select>
            <input type="text" class="form-control col-9" name="phone_number_2" placeholder="" aria-label="" aria-describedby="addon-wrapping">
        </div>

        <p>取引先の住所</p>
        <div class="border rounded p-2 mb-4">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputZip">郵便番号</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">都道府県</label>
                    <select id="street_address_1" class="form-control" name="street_address_1">
                        <option selected>岡山</option>
                        <option>広島</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">市町村</label>
                    <input type="text" class="form-control" id="inputCity" name="street_address_2">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">番地以下</label>
                <input type="text" class="form-control" id="inputAddress" name="street_address_3" placeholder="1丁目2番3号" >
            </div>
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">送信する</button>
        
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


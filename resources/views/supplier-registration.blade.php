@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('suppliers.show') }}">取引先</a></li>
            <li class="breadcrumb-item active" aria-current="page">取引先登録</li>
        </ol>
    </nav>

    <!-- フォーム -->
    <form action="{{ route('supplier-registration.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">取引先の名前</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="例：">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="person_charge">取引先の担当者</label>
            <input class="form-control @error('person_charge') is-invalid @enderror" id="person_charge" name="person_charge" value="{{ old('person_charge') }}" placeholder="例：">
            @error('person_charge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <p>取引先の電話番号</p>
        <div class="input-group mb-3" id="inputGroup">
                <select class="custom-select col-3 @error('phone_number_1') is-invalid @enderror" id="phone_number_1" name="phone_number_1" value="{{ old('phone_number_1') }}">
                    <option selected>0120</option>
                    <option>050</option>
                    <option value="etc">その他</option>
                </select>
            <input type="text" class="form-control col-9 @error('phone_number_2') is-invalid @enderror" name="phone_number_2" value="{{ old('phone_number_2') }}" placeholder="" aria-label="" aria-describedby="addon-wrapping">
            @if($errors->has('phone_number_1') || $errors->has('phone_number_2'))
                <?php
                    $phone_number_errors = $errors->get('phone_number_1');
                    $phone_number_errors += $errors->get('phone_number_2');
                ?>
                @foreach ($phone_number_errors as $phone_number_error)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $phone_number_error }}</strong>
                </span>
                @endforeach
            @endif
        </div>

        <p>取引先の住所</p>
        <div class="border rounded p-2 mb-4">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputZip">郵便番号</label>
                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">都道府県</label>
                    <select id="street_address_1" class="form-control @error('street_address_1') is-invalid @enderror" name="street_address_1" value="{{ old('street_address_1')}}">
                    <option value="" selected>-</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">市町村</label>
                    <input type="text" class="form-control @error('street_address_2') is-invalid @enderror" id="inputCity" name="street_address_2" value="{{ old('street_address_2')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">番地以下</label>
                <input type="text" class="form-control @error('street_address_3') is-invalid @enderror" id="inputAddress" name="street_address_3" value="{{ old('street_address_3')}}" placeholder="1丁目2番3号">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">登録する</button>
        
    </form>

</div>

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>

<script>
    $('#inputGroup').change(function() {
        if($('option:selected').val() == 'etc'){
            $('#inputGroup').html('<input type="text" class="form-control col-3 @error('phone_number_1') is-invalid @enderror" placeholder="" aria-label="" aria-describedby="addon-wrapping">' +
                '<input type="text" class="form-control col-9 @error('phone_number_2') is-invalid @enderror" placeholder="" aria-label="" aria-describedby="addon-wrapping">');
        }
    })
</script>
@stop

@stop


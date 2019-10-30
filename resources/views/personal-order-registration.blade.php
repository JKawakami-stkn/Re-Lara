@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('personal-orders.show') }}">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文登録</li>
        </ol>
    </nav>

    <form action="{{ route('personal-order-registration.store') }}" method="post">
        {{ csrf_field() }}
        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="class">組の名前</label>
                <select class="form-control form-control" id="class">
                    <option selected disabled="disabled">選択してください</option>
                    <option>組</option>
                    <option>組</option>
                    <option>組</option>
                </select>
            </div>
        </div>
        
        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="name">購入する園児の名前</label>
                <select class="form-control form-control" id="name" disabled>
                    <option selected disabled="disabled">選択してください</option>
                    <option>園児</option>
                </select>
            </div>
        </div>

        <p class="mb-2">期日</p>
        <div class="input-group mb-3 mt-0">
            <input type="date" class="form-control" name="deadline" aria-label="deadline">
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">送信する</button>
        
    </form>

</div>

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
<script src="{{ asset('public/js/select_child.js') }}"></script>
@stop

@stop


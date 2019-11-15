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

    <form action="{{ route('personal-order-edit.store', $personal_sale_id) }}" method="post">

        {{ csrf_field() }}
        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="group">組の名前</label>
                <select id="group" class="form-control form-control" disabled>
                    <option selected disabled="disabled">{{$kids_name}}</option>
                </select>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="kids">購入する園児の名前</label>
                <select id="kids" class="form-control form-control" name="kids_id" disabled>
                    <option selected disabled="disabled">{{$kids_group}}</option>
                </select>
            </div>
        </div>

        <p class="mb-2">期日</p>
        <div class="input-group mb-3 mt-0">
            <input type="date" class="form-control" name="deadline" aria-label="deadline" value={{$kids_deadline}}>
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">保存する</button>
        <input name="id" type="hidden" value={{$personal_sale_id}}>
    </form>

</div>

@section('script')
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/select_child.js') }}"></script>
@stop

@stop

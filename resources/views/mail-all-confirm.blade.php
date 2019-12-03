@extends('./layout')

@section('content')

@section('style')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
@stop

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>

        </ol>
    </nav>


    <p>販売会名：{{ $sale->name }}</p>

    <p class="text-center"></p>

    <p>上記の対象宛に、保護者入力用のURLが記載されたメールを送信しますか？</p>

    <div class="row ml-2">
        <form action="{{ route('mail-all-confirm.send', $sale->id) }}" method="POST">
            @csrf
            <button id="submit" type="submit" class="btn btn-primary">は　い</button>
        </form>

        <a class="btn btn btn-danger ml-2" href="{{ route('menu.show', $sale->id) }}" role="button">いいえ</a>
    </div>
</div>

@section('script')
<script src="{{ asset('js/loading.js') }}"></script>
@stop

@stop

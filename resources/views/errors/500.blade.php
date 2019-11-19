@extends('./layout')

@section('content')

<div class="container" >

    <div class="mt-5">
        <img src="{{ asset('img/error/500.png') }}" class="img-fluid img-responsive" alt="500_error_image" class="mt-5">
    </div>
    <a href="{{ route('menu.show') }}">メニュー画面に戻る</a>
</div>
@stop
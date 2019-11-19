@extends('./layout')

@section('content')

<div class="container" >

    <div class="mt-5">
        <img src="{{ asset('img/error/403.png') }}" class="img-fluid img-responsive" height="200" alt="403_error_image">
    </div>
    <a href="{{ route('menu.show') }}">メニュー画面に戻る</a>
</div>
@stop
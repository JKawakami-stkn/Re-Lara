@extends('./layout')

@section('content')

<div class="container" >

    <div class="mt-5">
        <img src="{{ asset('img/error/419.png') }}" class="img-fluid img-responsive" alt="409_error_image">
    </div>
    <a href="{{ route('menu.show') }}">メニュー画面に戻る</a>
</div>

@stop


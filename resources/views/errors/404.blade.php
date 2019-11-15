@extends('./layout')

@section('content')

<div class="container" >

    <img src="{{ asset('img/404.png') }}" class="img-fluid img-responsive" alt="404_error_image">

    <a class="btn btn-primary" href="{{ route('menu.show') }}" role="button">メニュー画面に戻る</a>
</div>
@stop
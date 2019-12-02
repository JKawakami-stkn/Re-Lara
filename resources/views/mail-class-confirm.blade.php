@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>

        </ol>
    </nav>


    <p>{{$sale->name}}</p>

    <p class="text-center">{{$class->GP_NM}}</p>

    @foreach($kids as $kid)
        <!-- {{$kid->KIDS_NM_KJ}}<br> -->
    @endforeach

    <p>上記の対象宛に、保護者入力用のURLが記載されたメールを送信しますか？</p>

    <div class="row">
        <form action="" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">は　い</button>
        </form>

        <a class="btn btn btn-danger ml-2" href="{{ route('menu.show', $sale->id) }}" role="button">いいえ</a>
    </div>
</div>


@stop

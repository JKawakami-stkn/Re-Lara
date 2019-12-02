@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>

        </ol>
    </nav>


    <p>販売会：{{ $sale->name }}</p>

    <p>対　象：{{ $kid->KIDS_NM_KJ }}</p>
    <p class="text-center">{{$mail->MAIL}}</p>

    <p>上記のメールアドレス宛に、保護者入力用のURLが記載されたメールを送信しますか？</p>

    <div class="row">
        <form action="{{ route('mail-personal-confirm.send', [$sale->id, $kid->KIDS_ID]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">は　い</button>
        </form>

        <a class="btn btn btn-danger ml-2" href="{{ route('menu.show', $sale->id) }}" role="button">いいえ</a>
    </div>
</div>


@stop
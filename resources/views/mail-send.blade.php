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

    <p>対象者に保護者入力用のURLが記載されたメールを送信しました。</p>

    <a class="btn btn btn-primary" href="{{ route('sale-menu', $sale->id) }}" role="button">戻　る</a>

</div>


@stop

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

    <p>{{$sale->name}}</p>

    <div class="row">
        <div class="col text-center">
            <p class="">{{$class->GP_NM}}</p>
            <p>
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    送信先一覧を表示
                </a>
            </p>
        </div>
    </div>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            @foreach($m_kids as $name => $mail)
                {{ $name ."：". $mail }}<br>
            @endforeach
        </div>
    </div>

    <p>上記の対象宛に、保護者入力用のURLが記載されたメールを送信しますか？</p>

    <div class="row ml-2">
        <form action="{{ route('mail-class-confirm.send', [$sale->id, $class->GP_CD]) }}" method="POST">
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

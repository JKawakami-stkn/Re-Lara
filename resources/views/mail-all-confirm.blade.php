@extends('./layout')

@section('content')

@section('style')
<link rel="stylesheet" href="{{ asset('css/loading.css') }}">
@stop

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('mail-target-type.show', [$sale->id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>


    <p>販売会名：{{ $sale->name }}</p>



    <div class="row">
        <div class="col text-center">
            @foreach($class as $c)
                <p class="">{{$c->GP_NM}}</p>
            @endforeach
            <p>
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    送信先一覧を表示
                </a>
            </p>
        </div>
    </div>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            @foreach($class as $c)
                <p class="mt-4">・{{$c->GP_NM}}</p>
                @foreach($kids_data[$c->GP_CD] as $name => $mail)
                    {{ $name ."：". $mail }}<br>
                @endforeach
                @if(empty($kids_data[$c->GP_CD]))
                    対象が見つかりません
                @endif
            @endforeach
        </div>
    </div>
    
    
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

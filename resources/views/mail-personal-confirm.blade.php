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
                <a href="{{ route('mail-personal-select.show', [$sale->id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <p>販売会：{{ $sale->name }}</p>

    <p>対　象：{{ $kid->KIDS_NM_KJ }}</p>
    <p class="text-center">{{$mail->MAIL}}</p>

    <p>上記のメールアドレス宛に、保護者入力用のURLが記載されたメールを送信しますか？</p>

    <div class="row ml-2">
        <form action="{{ route('mail-personal-confirm.send', [$sale->id, $kid->KIDS_ID]) }}" method="POST">
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

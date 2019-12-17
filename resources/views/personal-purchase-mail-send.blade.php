@extends('./layout')

@section('content')

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('personal-order-menu.show', [$personal_sale->id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>


    <p>{{ $kid->KIDS_NM_KJ }}さんの注文</p>

    <p class="text-center">{{ $mail->MAIL }}</p>

    <p>上記のメールアドレス宛に、保護者入力用のURLが記載されたメールを送信しました。</p>

    <a class="btn btn btn-primary" href="{{ route('personal-order-menu.show', $personal_sale->id) }}" role="button">戻　る</a>

</div>


@stop

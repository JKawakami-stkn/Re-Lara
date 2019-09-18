@extends('layout')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            TatudeGO-β
        </div>

    </div>
</div>
@endsection

<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        font-family: Meiryo, sans-serif;
        _color: #636b6f;
        color : gray;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        _letter-spacing: .1rem;
        text-decoration: none;
        _text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }


    #text{
        _font-family: Meiryo, sans-serif;
        line-height: 1.1;
        font-size: 4.5em;
        font-weight: bold;
        color: rgba(0,0,0,0); /*テキストは透過させる*/
        background-image: url(./img/4.png); /*背景の画像*/
        -webkit-background-clip: text;  /*背景をテキストでマスクする*/
    }

</style>
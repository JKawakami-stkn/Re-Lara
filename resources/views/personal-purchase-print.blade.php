@extends('./layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/print_details.css') }}">
@section('style')

@stop
<div class="container" style="min-width:695px;">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="">個別注文</a></li>
            <li class="breadcrumb-item active" aria-current="page">注文確認</li>
        </ol>
    </nav>

    <div id="carouselExampleControls" class="carousel slide border" data-ride="carousel">
        <!-- スライドさせる画像の設定 -->
        <div class="carousel-inner">
            <!--
            <div class="carousel-item  data-interval='0' ">
                <iframe id="inline-frame" src="https://webliker.info/" width="100%" height="100%"></iframe>
            </div>
            <div class="carousel-item data-interval='0'">
                <iframe id="inline-frame" src="https://www.eatone.co.jp/public/company/01_profile.html" width="100%" height="100%"></iframe>
            </div>
            -->
            <div class="carousel-item active data-interval='0'">

                <div class="wrapper">
                    <div class="content">

                        <div class="layout">
                            <div class="day">(日付)</div>

                            <div class="number">注文番号：(番号)</div>

                            <div class="header">
                                <div class="title">注　文　書</div>
                                <div class="sub-title">PURCHASE ORDER</div>
                            </div>

                            <div class="vender">
                                <div class="vendor-name"> 取引先名 </div>
                                <div class="vendor-rep">(取引先名)様</div>
                            </div>

                            <div class="office">
                                <div class="office-name">イートンちどり保育園</div>
                                <div class="postal-code">〒702-8024</div>
                                <div class="street-address">岡山市南区浦安南町425-1</div>
                                <div class="tel">TEL: 086-265-556</div>
                                <div class="fax">FAX: 086-265-5562</div>
                                <div class="rep">担当者：(担当者)様</div>
                            </div>

                            <div class="message"> 以下の通り発注いたします。</div>

                            <table>
                                <thead>
                                <tr>
                                    <th class="no">No</th>
                                    <th class="supplie-name">品 番 • 品 名</th>
                                    <th class="num">数 量</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no">00</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">04</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">05</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">06</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">07</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">08</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">09</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">10</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">11</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">12</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">13</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">14</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>
                                    <tr>
                                        <td class="no">15</td>
                                        <td class="supplie-name">(商品名 + SKU)</td>
                                        <td class="num">(数量)</td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="remarks">
                            備考：
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- スライドコントロールの設定 -->
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">前へ</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">次へ</span>
        </a>
    </div><!-- /.carousel -->


</div>

@section('script')
    <script src="{{ asset('js/print_details.js') }}"></script>
@stop

@stop


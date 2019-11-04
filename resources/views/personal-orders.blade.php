@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">個別注文</li>
        </ol>
    </nav>

    <a href="{{ route('personal-order-registration.show') }}">
        <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
    </a>

    <!-- テーブル -->
    <table class="table position-relative">
    <caption>個人購入</caption>
        <thead>
            <tr>
            <th>#</th>
            <th scope="col">購入者</th>
            <th scope="col">期日</th>
            <th scope="col"></th>
            </tr>
        </thead>
        @foreach($personal_sales as $personal_sale)
        <tbody>
            <tr class="table-success">
                <th scope="row">{{ $personal_sale->id }}</th>
                <td>{{ $personal_sale->m_kids->KIDS_NM_KJ }}</td>
                <td>{{ date('Y年m月d日', strtotime($personal_sale->deadline)) }}</td>
                <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='{{ route('personal-order-menu.show', $personal_sale->id)}}'"></td>
            </tr>
        </tbody>
        @endforeach
<!--
        <tbody>
            <tr class="table-danger">
                <th scope="row">2</th>
                <td>期日過ぎ太郎</td>
                <td>2020/10/10</td>
                <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
        <tbody>
            <tr class="table-warning">
            <th scope="row">3</th>
            <td>期日直前太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
        <tbody>
            <tr class="table-secondary">
            <th scope="row">4</th>
            <td>印刷済み太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
            <th scope="row">5</th>
            <td>入力まだ太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
-->
    </table>

</div>

@stop


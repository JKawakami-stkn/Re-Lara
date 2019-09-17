@extends('./layout')

@section('content')

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">注文状況確認</li>
    </ol>
</nav>

<div class="container">

    <form>
        <div class="row">
            <div class="col-md mt-3 mb-3">
                <div class="form-group">
                    <label for="FormControlSelect">確認したい組</label>
                    <select class="form-control form-control-lg" id="FormControlSelect">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
        </div>
    </form>


    <div class="accordion" id="accordion2" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="heading1" style="background-color:#c9c9c9;">
                <h5 class="mb-0">
                    <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> 園児の名前１ </a>
                </h5>
            </div>
            <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1" _data-parent="#accordion2">
                <div class="card-body">
                    <table class="table">
                        <caption>園児の名前１の注文</caption>
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th scope="col">用品</th>
                                <th scope="col">数量</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>・</th>
                                <td>テーブルのセル</td>
                                <td>810</td>
                            </tr>
                            <tr>
                                <th>・</th>
                                <td>テーブルのセルテーブルのセル</td>
                                <td>810</td>
                            </tr>
                            <tr>
                                <th>・</th>
                                <td>テーブルのセルテーブルのセルテーブルのセルテーブルのセル</td>
                                <td>810</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gradient-secondary" role="tab" id="heading2" style="background-color:#c9c9c9;">
                <h5 class="mb-0">
                    <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2"> 園児の名前２ </a>
                </h5>
            </div>
            <div id="collapse2" class="collapse show" role="tabpanel" aria-labelledby="heading2"_ data-parent="#accordion2">
                <div class="card-body">
                        <table class="table">
                            <caption>園児の名前２の注文</caption>
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th scope="col">用品</th>
                                    <th scope="col">数量</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>・</th>
                                    <td>テーブルのygoygaaaaaaaaaaaaaaaaaaaaaaセル</td>
                                    <td>810</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

       
    </div>
    





</div>
@stop


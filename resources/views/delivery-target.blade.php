@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale_name) }}">{{ $sale_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">引き渡し</li>
        </ol>
    </nav>

    <form>
        <div class="row">
            <div class="col-md mt-3 mb-3">
                <div class="form-group">
                    <label for="FormControlSelect">組の名前</label>
                    <select class="form-control form-control-lg" id="FormControlSelect">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md mt-3 mb-3">
                <div class="form-group">
                    <label for="FormControlSelect">引き渡しをする園児の名前</label>
                    <select class="form-control form-control-lg" id="FormControlSelect" disabled>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
        </div>

            <div class="mt-5 mb-3">
                <!-- <button type="submit" class="btn btn-primary btn-block">選　　択</button> -->
                <a class="btn btn-primary btn-block" href="{{ route('purchase-supplies', [$sale_name, '例之太郎']) }}" role="button">選　　択</a>
            </div>

    </form>
</div>


@stop


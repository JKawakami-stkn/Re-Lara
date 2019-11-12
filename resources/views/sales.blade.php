@extends('./layout')

@section('content')

<a href="{{ route('sale-registration') }}">
    <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
</a>

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">物品販売</li>
        </ol>
    </nav>

    <!-- 並び替え -->
    <div class="row">
        <div class="col-12 clearfix">
            <button type="button" class="btn btn-link mb-3 float-right" data-toggle="modal" data-target="#Modal" style="text-decoration: none; ">
                現在選択中の並び替えを表示予定
            </button>
        </div>
    </div>

    <!-- モーダル -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">並び替え</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    TODO : 並び替え項目洗い出し
                    <div class="custom-control custom-radio mt-4 mb-4">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                    </div>
                    <div class="custom-control custom-radio mt-4 mb-4">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- カード -->
    @foreach ($sales as $sale)
        <div class="card mb-4">
            <h5 class="card-header text-center">{{$sale->name}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                    期　日：
                </p>
                <a href="{{ route('sale-menu', $sale->id) }}" class="btn btn-primary btn-block" style="width:100%;">選択する</a>
            </div>
        </div>
    @endforeach
    
</div>

@stop


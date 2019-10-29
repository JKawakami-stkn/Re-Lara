@extends('./layout')

@section('content')

<div class="container">

<!-- パンくずリスト -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
        <li class="breadcrumb-item"><a href="{{ route('suppliers.show') }}">取引先</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $supplier->name }}</li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
  <div class="card-body">
    <h4>{{ $supplier->name }}の詳細</h4>
    <br>
    <p>　取引先担当者：{{ $supplier->person_charge }}</p>
    <p>　郵便番号：{{ $supplier->postal_code }}</p>
    <p>　住　所：{{ $supplier->street_address_1." ".$supplier->street_address_2." ".$supplier->street_address_3 }}</p>
    <p>　電話番号：{{ $supplier->phone_number }}</p>
    <p>　取り扱い商品：</p>
    
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('supplies', $supplier) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/supplies.png') }}" data-toggle="tooltip" title="取扱商品">
                </div>
             </a>
        </div>

        <div class="col-4">
            <a href="{{ route('supplier-edit.show', $supplier) }}">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/edit.png') }}" data-toggle="tooltip" title="編集">
                </div>
            </a>
        </div>

        <div class="col-4">
            <a href="" data-toggle="modal" data-target="#ModalLong">
                <div class="card card-body">
                    <img class="card-img" src="{{ asset('img/remove.png') }}" data-toggle="tooltip" title="削除">
                </div>
            </a>
        </div>

    </div>

     <!-- モーダルの設定 -->
     <div class="modal fade" id="ModalLong" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLongTitle">本当に{{ $supplier->name }}を削除しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="float-right btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <form action="{{(route('supplier-delete', $supplier)) }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="float-right btn btn-danger mr-3">削　除</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@stop


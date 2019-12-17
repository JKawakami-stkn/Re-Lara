@extends('./layout')

@section('content')

<div class="container">

<!-- 戻るボタン -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('supplies', $supplier->id) }}">
                <i class="fas fa-arrow-left"></i> 戻 る
            </a>
        </li>
    </ol>
</nav>

<div class="card _border-0 mb-4">
    <h4 class="mt-3 ml-2">{{ $supplie->name }}の詳細</h4>
    <img class="card-img-top mx-auto border" src="{{ asset('storage/'.$supplie->img_path) }}">
    <div class="card-body">
        <br>
        <p>　価　格：{{ $supplie->price }}</p>
        <p>　サイズ：
          @foreach($sku as $s_sku)
          {{ $s_sku["size"] }}
          @endforeach
        </p>
        <p>　カラー：
          @foreach($sku as $s_sku)
          {{ $s_sku["color"] }}
          @endforeach
        </p>
        <p>　区　分：
          {{ $division_name[0]["division_name"] }}
        </p>
  </div>
</div>

<div class="row">

</div>
    <div class="row mb-4">

        <!-- 画像のみカード -->
        <div class="col-4">
            <a href="{{ route('supplie-edit.show', [$supplier, $supplie]) }}">
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
                    <h5 class="modal-title" id="ModalLongTitle">本当に{{ $supplie->name }}を削除しますか？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <button type="button" class="float-right btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <form action="{{ route('supplie-menu.delete', [ $supplier->id, $supplie->id])}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="float-right btn btn-danger mr-3">削　除</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>

</div>

@stop

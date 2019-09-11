@extends('./layout')

@section('content')

<button type="button" class="btn btn-primary rounded-circle p-0 position-fixed" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">商品</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="card img-thumbnail mb-4">
                <img class="card-img-top mx-auto" src="{{ asset('spplie_imgs/fashion_tsuugakubou_hat.png') }}">
                <div class="card-body px-2 py-3">
                    <h5 class="card-title">帽子</h5>
                    <p class="card-text">発注先：</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary btn-sm" style="width:100%;">確　認</a></p>

                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-sm-6.col-md-3 -->

        <div class="col-sm-6 col-md-6">
            <div class="card img-thumbnail mb-4">
                <img class="card-img-top mx-auto" src="{{ asset('spplie_imgs/taisougi.png') }}">
                <div class="card-body px-2 py-3">
                    <h5 class="card-title">体操服</h5>
                    <p class="card-text">発注先：</p>
                    <p class="mb-0"><a href="#" class="btn btn-primary btn-sm" style="width:100%;">確　認</a> </p>

                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-sm-6.col-md-3 -->
    </div><!-- /.row -->

    


</div>

<style>
    .card-img-top {
        width: 200px;
        height: 150px;
        object-fit: cover; /* この一行を追加するだけ！ */
    }
</style>
@stop


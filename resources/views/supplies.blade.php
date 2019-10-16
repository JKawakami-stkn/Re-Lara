@extends('./layout')

@section('content')

<a href="{{ route('supplie-registration.show', $supplier->id) }}">
    <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
</a>

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('suppliers.show') }}">取引先</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier-menu', $supplier->id) }}">{{$supplier->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">取り扱い商品</li>
        </ol>
    </nav>

    <!-- カード -->
    <div class="row">
        @foreach($supplies as $supplie)
            <div class="col-sm-6 col-md-6">
                <div class="card img-thumbnail mb-4">
                    <img class="card-img-top mx-auto" src="{{ asset('storage/'.$supplie->img_path) }}">
                    <div class="card-body px-2 py-3">
                        <h5 class="card-title">{{ $supplie->name }}</h5>
                        <p class="mb-0"><a href="#" class="btn btn-primary btn-sm" style="width:100%;">確　認</a></p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

<style>
    .card-img-top {
        width: 200px;
        height: 150px;
        object-fit: cover;
    }
</style>
@stop


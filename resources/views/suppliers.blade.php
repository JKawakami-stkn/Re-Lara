@extends('./layout')

@section('content')

<a href="{{ route('supplier-registration.show') }}">
    <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
</a>

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">取引先</li>
        </ol>
    </nav>

    <!-- カード -->
    @foreach($suppliers_data as $supplier)
    <div class="card mb-4">
        <h5 class="card-header text-center">{{$supplier->name}}</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
                住所：{{$supplier->street_address_1." ".$supplier->street_address_2." ".$supplier->street_address_3}}
            </p>
            <p class="card-text">
                TEL：{{$supplier->phone_number}}
            </p>
            <a href="{{ route('supplier-menu', $supplier->id) }}" class="btn btn-primary btn-block" style="width:100%;">選択する</a>
        </div>
    </div>
    @endforeach
</div>

@stop


@extends('./layout-outside')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            
        </ol>
    </nav>

    <p>{{ $supplie->supplier->name }}</p>
    <p style="font-size:20px">{{ $supplie->name }}</p>

    <img src="{{ asset('storage/'.$supplie->img_path) }}" height="250px" class="img-fluid mx-auto d-block">

    <form action="{{ route('personal-purchase-parent-input-supplie.store', [$personal_sale->id, $token, $supplie->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label>サイズ</label>
            <select class="form-control" id="exampleFormControlSelect1" name="size_value">
              @foreach($supplie_size as $size_v)
                  @foreach($size_v as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>カラー</label>
            <select class="form-control" id="exampleFormControlSelect1" name="color_value">
              @foreach($supplie_color as $color_v)
                  @foreach($color_v as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              @endforeach
            </select>
        </div>

        <p class="mt-5 mb-5">価格：{{ number_format($supplie->price) }}</p>

        <p>数量</p>
        <div class="input-group">
            <input type="text" class="form-control" name="quantity" aria-label="数量">
            <div class="input-group-append">
                <span class="input-group-text">個</span>
            </div>
        </div>

        @if($personal_order->isEmpty())
            <input type="hidden" name="personal_order_id" value="">
        @else
            <input type="hidden" name="personal_order_id" value="{{ $personal_order[0]->id }}">
        @endif

        <div class="mt-5 mb-3">
            <button type="submit" class="btn btn-primary btn-block" onclick="window.onbeforeunload=null">カートに入れる</button>
        </div>

    </form>

</div>

<style>
    .img-fluid {
        _width: 250px;
        height: 250px;
        object-fit: cover;
    }
</style>
@stop

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
@stop

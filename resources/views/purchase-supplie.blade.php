@extends('./layout')

@section('content')

<div class="container">

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('purchase-supplies', [$sale->id,$target]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <p>企業名</p>
    <p>{{$supplier->name}}</p>


    <img src="{{ asset('spplie_imgs/taisougi.png') }}" height="250px" class="img-fluid mx-auto d-block">

     <form action="{{ route('purchase-supplie.store',[$sale->id,$target,$supplie->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>サイズ</label>
            <select class="form-control @error('size_value') is-invalid @enderror" id="exampleFormControlSelect1" name="size_value">
              @foreach($supplie_size as $size_v)
                  @foreach($size_v as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              @endforeach
            </select>
            @error('size_value')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
        </div>

        <div class="form-group">
            <label>カラー</label>
            <select class="form-control @error('color_value') is-invalid @enderror" id="exampleFormControlSelect1" name="color_value">
              @foreach($supplie_color as $color_v)
                  @foreach($color_v as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
              @endforeach
            </select>
            @error('color_value')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

    <p class="mt-5 mb-5">価格：{{$supplie->price}}</p>

        <p>数量</p>
        <div class="input-group">
            <input type="text" class="form-control @error('quantity') is-invalid @enderror" aria-label="ドル金額（小数点以下2桁）" name="quantity">
            <div class="input-group-append">
                <span class="input-group-text">個</span>
            </div>
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="mt-5 mb-3">
             <button type="submit" class="btn btn-primary btn-block">カートに入れる</button>
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

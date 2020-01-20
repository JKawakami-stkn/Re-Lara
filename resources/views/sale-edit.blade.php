@extends('./layout')

@section('content')

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sale-menu', [$sale->id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <!-- ページタイトル -->
    <form action="{{ route('sale-editStore',$sale->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sale_name">販売会の名前</label>
            <input class="form-control" id="sale_name" name="sale_name" value="{{$sale->name}}" placeholder="例：">
        </div>

    <input type="hidden" name="saleid" value="{{$sale->id}}">

        <p class="mb-2">対象選択</p>
        @if($errors->has('kumis'))
         <div class="alert alert-danger">{{ $errors->first('kumis') }}</div>
        @endif
        <div class="form-group form-check border rounded">
            @foreach($kumis as $kumi)
                @if($loop->index % 2 == 0)
                <div class="row">
                @endif
                    <div class="col-sm-6 col-12">
                        <input type="checkbox" class="form-check-input " id="{{$kumi->GP_CD}}" name="kumis[]" value="{{$kumi->GP_CD}}">
                        <label class="form-check-label mt-2 mb-1 mr-3" for="{{$kumi->GP_CD}}">{{$kumi->GP_NM}}</label>
                    </div>
                @if($loop->index % 2 == 1)
                </div>
                @elseif($loop->last && $loop->index % 2 == 0)
                </div>
                @endif

            @endforeach
        </div>


        <p class="mb-2">用品選択</p>
        @if($errors->has('supplie'))
          <div class="alert alert-danger">{{ $errors->first('supplie') }}</div>
        @endif
        <div class="form-group form-check border rounded">
            @foreach ($supplies as $supplie)
                @if($loop->index % 2 == 0)
                <div class="row">
                @endif
                    <div class="col-sm-6 col-12">
                        <input type="checkbox" class="form-check-input" name="supplie[]" id="{{$supplie->id}}" value="{{$supplie->id}}">
                        <label class="form-check-label mt-2 mb-1 mr-3" for="{{$supplie->id}}" >{{$supplie->name}}</label>
                    </div>
                @if($loop->index % 2 == 1)
                </div>
                @elseif($loop->last && $loop->index % 2 == 0)
                </div>
                @endif
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">保存する</button>
    </form>

</div>

@section('script')
<script src="{{ asset('public/js/dialog.js') }}"></script>
@stop

@stop


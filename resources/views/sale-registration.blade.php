@extends('./layout')

@section('content')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/active_or_none.css') }}">
@stop

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item active" aria-current="page">販売会登録</li>
        </ol>
    </nav>

    <!-- ページタイトル -->
    <form action="{{ route('sale-registration.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sale_name">販売会の名前</label>
            <input class="form-control @error('sale_name') is-invalid @enderror" id="sale_name" name="sale_name" placeholder="例："　value="{{ old('sale_name')}}">
            @error('sale_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>

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
                        <input type="checkbox" class="form-check-input　@error('kumis') is-invalid @enderror" id="{{$kumi->GP_CD}}" name="kumis[]" value="{{$kumi->GP_CD}}">
                        <label class="form-check-label mt-2 mb-1 mr-3" for="{{$kumi->GP_CD}}">{{$kumi->GP_NM}}</label>
                    </div>
                @if($loop->index % 2 == 1)
                </div>
                @elseif($loop->last && $loop->index % 2 == 0)
                </div>
                @endif

            @endforeach
        </div>


        <input id="ajax_division" type="hidden" value= "{{route('sale-registrationLoad')}}">
        <p class="mb-2">用品選択</p>
        @if($errors->has('supplie'))
          <div class="alert alert-danger">{{ $errors->first('supplie') }}</div>
        @endif
        <div class="form-group col-md-4">
        <label for="inputState">区分</label>
          <select id="division_inputState" class="form-control">
            @foreach($supp_divi as $division)
              @if($division_id == $division->id)
                <option selected value="{{ $division->id }}" data-group = "{{$division->id}}"　class="search_item is-active">{{ $division->division_name }}</option>
              @else
                <option value="{{ $division->id }}" data-group = "{{$division->id}}" class="search_item" >{{ $division->division_name }}</option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="form-group form-check border rounded">
            @foreach ($supplies as $supplie)
                @if($loop->index % 2 == 0)
                <div class="row">
                @endif
                      <div class="col-sm-6 col-12" >
                          <input type="checkbox" class="form-check-input list_item" data-group="{{$supplie->division_id}}" name="supplie[]" id="{{$supplie->id}}" value="{{$supplie->id}}">
                          <label class="form-check-label mt-2 mb-1 mr-3" for="{{$supplie->id}}" >{{$supplie->name}}</label>
                      </div>
                @if($loop->index % 2 == 1)
                </div>
                @elseif($loop->last && $loop->index % 2 == 0)
                </div>
                @endif
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">登録する</button>
    </form>

</div>

@section('script')
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/division_change.js') }}"></script>
@stop

@stop

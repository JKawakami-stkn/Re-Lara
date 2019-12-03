@extends('./layout')

@section('content')

<div class="container">

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sales') }}">物品販売</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sale-menu', $sale->name) }}">{{ $sale->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">引き渡し</li>
        </ol>
    </nav>

    <form action="{{ route('delivery-target.store',$sale->id) }}" method="post">

            {{ csrf_field() }}

         <!-- jsでajaxのリンクを取得するため -->
        <input type="hidden" id="ajax_url" value="{{ route('delivery-target.load',$sale->id) }}">

        <div class="row">
            <div class="col-md mt-3 mb-3">
                <div class="form-group">
                    <label for="FormControlSelect">組の名前</label>
                    <select class="form-control form-control-lg" id="group">
                          <option selected disabled="disabled">選択してください</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->GP_CD }}">{{ $group->GP_NM }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md mt-3 mb-3">
                <div class="form-group">
                    <label for="FormControlSelect">引き渡しをする園児の名前</label>
                    <select id="kids" class="form-control form-control  @error('kids_id') is-invalid @enderror" name="kids_id" disabled>
                            <option selected disabled="disabled">選択してください</option>
                    </select>
                    @error('kids_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
            </div>
        </div>

            <div class="mt-5 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">選　　択</button> 
            </div>

    </form>
</div>

@stop

@section('script')
<script src="{{ asset('js/select_child.js') }}"></script>
@stop


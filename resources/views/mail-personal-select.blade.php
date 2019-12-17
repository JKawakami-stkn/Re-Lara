@extends('./layout')

@section('content')

<div class="container">

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('mail-target-type.show', [$sale->id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <form action="{{ route('mail-personal-confirm.show', $sale->id) }}" method="get">

        {{ csrf_field() }}

        <!-- jsでajaxのリンクを取得するため -->
        <input type="hidden" id="ajax_url" value="{{ route('delivery-target.load',$sale->id) }}">

        <div class="row">
        <div class="col-md mt-3 mb-3">
            <div class="form-group">
                <label for="FormControlSelect">組の名前</label>
                <select class="form-control form-control-lg" id="group" name="group">
                    <option selected disabled="disabled">選択してください</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->GP_CD }}">{{ $group->GP_NM }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-md mt-3 mb-3">
            <div class="form-group">
                <label for="FormControlSelect">メールを送信する園児</label>
                <select id="kids" class="form-control form-control-lg" name="kids" disabled>
                        <option selected disabled="disabled">選択してください</option>
                </select>
            </div>
        </div>
        </div>

        <div class="mt-5 mb-3">
                <button type="submit" class="btn btn-primary btn-block">選　　択</button>
        </div>

    </form>

@stop

@section('script')
<script src="{{ asset('js/select_child.js') }}"></script>
@stop

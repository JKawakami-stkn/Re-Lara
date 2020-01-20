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


    <form action="{{ route('mail-class-confirm.show',$sale->id) }}" method="get">

        {{ csrf_field() }}

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
        </div>

        <div class="mt-5 mb-3">
            <button type="submit" class="btn btn-primary btn-block">選　　択</button>
        </div>

    </form>

</div>

@stop


@extends('./layout')

@section('content')

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('personal-orders.show') }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <form action="{{ route('personal-order-registration.store') }}" method="post">

        {{ csrf_field() }}

        <!-- jsでajaxのリンクを取得するため -->
        <input type="hidden" id="ajax_url" value="{{ route('personal-order-registration.load') }}">

        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="group">組の名前</label>
                <select id="group" class="form-control form-control">
                    <option selected disabled="disabled">選択してください</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->GP_CD }}">{{ $group->GP_NM }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="form-group">
                    <label for="kids">購入する園児の名前</label>
                <select id="kids" class="form-control form-control @error('kids_id') is-invalid @enderror" name="kids_id" disabled>
                        <option selected disabled="disabled">選択してください</option>
                </select>
                @error('kids_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
            </div>
        </div>

        <p class="mb-2">期日</p>
        <div class="input-group mb-3 mt-0">
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{old('deadline')}}" aria-label="deadline">
            @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
             @enderror
        </div>

        <!-- <p class="mb-2">入力</p>
        <div class="border rounded p-2 mb-4">
            <div id="color-form-row" class="form-row">
                <div class="input-group col-md-12 ">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">今すぐ入力</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">保護者が入力</label>
                    </div>
                </div>
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">登録する</button>

    </form>

</div>

@section('script')
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/select_child.js') }}"></script>
@stop

@stop

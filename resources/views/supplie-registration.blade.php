@extends('./layout')

@section('content')

<div class="container">

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('supplies.show') }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>
    
    <!-- フォーム -->
    <form action="{{ route('supplie-registration.store', $supplier->id) }}" method="post" enctype="multipart/form-data" accept-charset="ASCII">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">用品名</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="例：">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <p class="mb-2">価格</p>
        <div class="input-group mb-3 mt-0">
            <input type="number" class="form-control" name="price" aria-label="">
            <div class="input-group-append">
                <span class="input-group-text">円</span>
            </div>
        </div>

        <p class="mb-2">サイズ</p>
        <div id="no_radio" class="mb-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="yes" checked>
            <label class="form-check-label" for="inlineRadio1">あり</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="no">
            <label class="form-check-label" for="inlineRadio2">なし</label>
          </div>
        </div>
        <div class="border rounded p-2 mb-3" id="input_size">
            <div id="size-form-row" class="form-row">
                <div class="input-group input-group-size col-md-6 mb-1">
                    <input type="text" class="form-control @error('size') is-invalid @enderror size bachsize" name="sizes[]" value="{{ old('size')}}" placeholder="" aria-label="" aria-describedby="button-addon">
                    <div class="input-group-append" id="button-addon">
                        <button type="button" id="button-addon" class="btn btn-outline-success size-add-button-addon">＋</button>
                        <button type="button" id="button-addon" class="btn btn-outline-danger size-remove-button-addon">ー</button>
                    </div>
                </div>
            </div>
        </div>

        <p class="mb-2">カラー</p>
        <div id="no_radio2">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="color_inlineRadioOptions" id="color_inlineRadio1" value="yes" checked>
            <label class="form-check-label" for="color_inlineRadio1">あり</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="color_inlineRadioOptions" id="color_inlineRadio2" value="no">
            <label class="form-check-label" for="color_inlineRadio2">なし</label>
          </div>
        </div>
        <div class="border rounded p-2 mb-4" id="input_color">
            <div id="color-form-row" class="form-row">

                <div class="input-group input-group-color col-md-12 mb-1">
                    <input type="text" class="form-control @error('color') is-invalid @enderror color colorsize" name="colors[]" value="{{ old('color')}}" placeholder="" aria-label="" aria-describedby="button-addon">
                    <!--<select class="custom-select" name="colors[target]" id="inputGroupSelect01">
                        <option selected value="">対象</option>
                        <option value="1">その1</option>
                        <option value="2">その2</option>
                        <option value="3">その3</option>
                    </select>-->
                    <div class="input-group-append" id="button-addon">
                        <button type="button" id="button-addon" class="btn btn-outline-success color-add-button-addon">＋</button>
                        <button type="button" id="button-addon" class="btn btn-outline-danger color-remove-button-addon">ー</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <p class="mb-2">男女による違い</p>
        <div class="border rounded p-2 mb-4">
            <div id="color-form-row" class="form-row">
                <div class="input-group col-md-12 ">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">あり</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">なし</label>
                    </div>
                </div>
            </div>
        </div> -->



        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="division">用品区分</label>
                <select class="form-control form-control" id="division" name="division">
                    <option selected disabled="disabled">選択してください</option>
                    @foreach($supplie_division as $division)
                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <p class="mb-2">イメージ</p>
        <div class="input-group mb-5">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="img_path">
                <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
            </div>
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary reset">取消</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">登録する</button>

    </form>

</div>


@section('script')
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/upload_image.js') }}"></script>
@stop

@stop

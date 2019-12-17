@extends('./layout')

@section('content')

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('personal-order-menu.show', [$personal_sale_id]) }}">
                    <i class="fas fa-arrow-left"></i> 戻 る
                </a>
            </li>
        </ol>
    </nav>

    <form action="{{ route('personal-order-edit.store', $personal_sale_id) }}" method="post">

        {{ csrf_field() }}
        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="group">組の名前</label>
                <select id="group" class="form-control form-control" disabled>
                    <option selected disabled="disabled">{{$kids_name}}</option>
                </select>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="form-group">
                <label for="kids">購入する園児の名前</label>
                @if($errors->has('kids_id'))
                 @foreach($errors->get('kids_id') as $message)
                    <li style="color:#ff0000;"> {{ $message }} </li>
                 @endforeach
                @endif 
                <select id="kids" class="form-control form-control" name="kids_id" disabled>
                    <option selected disabled="disabled">{{$kids_group}}</option>
                </select>
            </div>
        </div>

        <p class="mb-2">期日</p>
        <div class="input-group mb-3 mt-0">
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{old('deadline')}}" aria-label="deadline" value={{$kids_deadline}}>
            @error('deadline')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>

        <button type="submit" class="btn btn-primary" onclick="window.onbeforeunload=null">保存する</button>
        <input name="id" type="hidden" value={{$personal_sale_id}}>
    </form>

</div>

@section('script')
<script src="{{ asset('js/dialog.js') }}"></script>
<script src="{{ asset('js/select_child.js') }}"></script>
@stop

@stop

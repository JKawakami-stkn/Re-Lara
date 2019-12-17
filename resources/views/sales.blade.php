@extends('./layout')

@section('content')

<a href="{{ route('sale-registration') }}">
    <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
</a>

<div class="container" >

    <!-- 戻るボタン -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="{{ route('menu.show') }}">
                  <i class="fas fa-arrow-left"></i> 戻 る
              </a>
          </li>
      </ol>
    </nav>

    <div>
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
        表示順変更
      </button>
    </div>
    <input id="ajax_division" type="hidden" value= "{{route('sales.load')}}">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">表示順変更</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="並び">
              <h5>並び替え</h5>
              <h7>期日</h7>
                @if($radio_name == "up_sort")
                  <div class="form-check form-check-inline　sort_radio">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="up_sort" checked>
                    <label class="form-check-label" for="inlineRadio1">昇順</label>
                  </div>
                @else
                  <div class="form-check form-check-inline　sort_radio">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="up_sort">
                    <label class="form-check-label" for="inlineRadio1">昇順</label>
                  </div>
                @endif

                @if($radio_name == "down_sort")
                  <div class="form-check form-check-inline sort_radio">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="down_sort" checked>
                    <label class="form-check-label" for="inlineRadio2">降順</label>
                  </div>
                @else
                  <div class="form-check form-check-inline sort_radio">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="down_sort">
                    <label class="form-check-label" for="inlineRadio2">降順</label>
                  </div>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="NotSave_button">Close</button>
              <button type="button" class="btn btn-primary" id="Save_button_to_Sale">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- カード -->
    @foreach ($sales as $sale)
        <div class="card mb-4">
            <h5 class="card-header text-center">{{$sale->name}}</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                    期　日：{{$sale->deadline}}
                </p>
                <a href="{{ route('sale-menu', $sale->id) }}" class="btn btn-primary btn-block" style="width:100%;">選択する</a>
            </div>
        </div>
    @endforeach

</div>
@section('script')
<script src="{{ asset('js/personal_order_sort.js') }}"></script>
@stop

@stop

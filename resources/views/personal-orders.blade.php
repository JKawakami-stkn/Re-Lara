@extends('./layout')

@section('content')

<div class="container" >

    <!-- パンくずリスト -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('menu.show') }}">メニュー</a></li>
            <li class="breadcrumb-item active" aria-current="page">個別注文</li>
        </ol>
    </nav>

    <a href="{{ route('personal-order-registration.show') }}">
        <button type="button" class="btn btn-primary rounded-circle p-0 position-fixed border-white" style="width:4rem;height:4rem; bottom:55px; right:20px; z-index:30;">＋</button>
    </a>

    <!-- テーブル -->
    <table class="table position-relative">
    <caption>個人購入</caption>
        <thead>
            <tr>
            <th>#</th>
            <th scope="col">　購入者</th>
            <th scope="col">　期日</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
          表示順変更
        </button>







        <!-- ajax もどき-->
        <input id="ajax_division" type="hidden" value= "{{route('personal-orders.load')}}">
        <!-- ここまで -->





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
                <div class="narabi">
                  <h5>絞り込み</h5>
                  <div class="form-group">
                    <label for="group_select">組</label>
                    <select class="form-control" id="group_select">
                      @if($group_id == "all")
                        <option value="all" selected>全て</option>
                      @else
                        <option value="all">全て</option>
                      @endif

                      @foreach($this_year_group as $group)
                        @if($group_id == $group->GP_CD)
                          <option value="{{$group->GP_CD}}" selected>{{$group->GP_NM}}</option>
                        @else
                          <option value="{{$group->GP_CD}}">{{$group->GP_NM}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="sibori">
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
                <button type="button" class="btn btn-primary" id="Save_button">Save changes</button>
              </div>
            </div>
          </div>
        </div>


        @foreach($personal_sales as $personal_sale)
          <tbody>
              <tr class="table">
                  <th scope="row">{{ $personal_sale->id }}</th>
                  <td>{{ $personal_sale->m_kids->KIDS_NM_KJ }}</td>
                  <td>{{ date('Y/m/d', strtotime($personal_sale->deadline)) }}</td>
                  <td><input type="button" class="btn-sm btn-outline" value="確　認" onclick="location.href='{{ route('personal-order-menu.show', $personal_sale->id)}}'"></td>
              </tr>
          </tbody>
        @endforeach
<!--

        <tbody>
            <tr class="table-warning">
            <th scope="row">3</th>
            <td>期日直前太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
        <tbody>
            <tr class="table-secondary">
            <th scope="row">4</th>
            <td>印刷済み太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
            <th scope="row">5</th>
            <td>入力まだ太郎</td>
            <td>2020/10/10</td>
            <td><input type="button" class="btn-sm btn-outline-primary" value="確　認" onclick="location.href='#'"></td>
            </tr>
        </tbody>
-->
    </table>

</div>
@section('script')
<script src="{{ asset('js/personal_order_sort.js') }}"></script>
@stop
@stop

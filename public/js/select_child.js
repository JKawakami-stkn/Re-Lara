/**
 * ※注意事項※
 * 処理の流れはPersonalOrderRegistrationを参考にしてください
 * 組セレクトボックスID : group
 * 園児セレクトボックスID : kids
*/

var ajax_url = $("#ajax_url").val()

if($('#group').val() != null){
  $('#kids').prop('disabled', false);
  getKids(ajax_url);
}

$('#group').change( function() {
  getKids(ajax_url);
});

function getKids(url){
  var group_selector =  $('#group');
  var kids_selector = $('#kids');
  console.log(ajax_url + '/' + group_selector.val())
  $(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
          }
      })
      $.ajax({
        type: 'POST',
          url: url + '/' + group_selector.val(),
          dataType: 'json', // 読み込むデータの種類
      }).done(function (results) {
          // 成功時の処理
        console.log(results);
          kids_selector.empty(); // 子要素をすべて削除
          // 選択された組に園児が所属している場合
          if(results.length != 0){
            kids_selector.append("<option selected disabled='disabled'>選択してください</option>"); // 初期値
            results.forEach(function(res){
              kids_selector.append("<option value='" + res.KIDS_ID + "'>" + res.KIDS_NM_KJ + "</option>"); // 園児追加
            });
            kids_selector.prop('disabled', false); // 園児選択可能
          // 選択された組に園児が所属していない場合
          }else{
            kids_selector.prop('disabled', true); // 園児選択不可能
            kids_selector.append("<option selected disabled='disabled'>園児が見つかりません</option>"); // 初期値
          }

      }).fail(function (err) {
          // 失敗時の処理
          alert('データの取得に失敗しました。画面を更新してください');
      });
  });
}
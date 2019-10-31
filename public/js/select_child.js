if($('#group').val() != null){
  $('#kids').prop('disabled', false);
  getKids()
}

$('#group').change( function() {
console.log($('#group').val())
  $('#kids').prop('disabled', false);
  getKids()
});

/**
 * 組セレクトボックスID : group
 * 園児セレクトボックスID : kids
 */
function getKids(ajax_url){
  var group_selector =  $('#group');
  var kids_selector = $('#kids');
  $(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
          }
      })
      $.ajax({
          type: 'POST',
          url: ajax_url + '/' + group_selector.val(),
          dataType: 'json', // 読み込むデータの種類
      }).done(function (results) {
          // 成功時の処理
          console.log(results)
      }).fail(function (err) {
          // 失敗時の処理
          alert('データの取得に失敗しました。画面を更新してください');
      });
  });
}
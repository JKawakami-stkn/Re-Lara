$(function () {
    $("#Save_button").click(function () {
      console.log($("#group_select").val());
      var group_id = $("#group_select").val();

      var radio_id;
      console.log($("input[name='inlineRadioOptions']:checked").val());
      if($("input[name='inlineRadioOptions']:checked").val() == null){
        radio_id = "none";
      }else{
        radio_id = $("input[name='inlineRadioOptions']:checked").val();
      }
      var url = $("#ajax_division").val();
      console.log(url + "/" + group_id + "/" + radio_id);
      window.addEventListener('beforeunload', function (e) {
        // イベントをキャンセルする
        e.preventDefault();

        // Chrome では returnValue を設定する必要がある
        e.returnValue = '';


      });
      window.location.href = url + "/" + group_id + "/" + radio_id;
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
          }
      })
      // $.ajax({
      //   type: 'POST',
      //     url: url + division_id,
      // });
   });
});

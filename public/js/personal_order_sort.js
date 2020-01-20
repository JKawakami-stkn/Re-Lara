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
$(function () {
    $("#Save_button_to_Sale").click(function () {

      var radio_id;
      console.log($("input[name='inlineRadioOptions']:checked").val());
      if($("input[name='inlineRadioOptions']:checked").val() == null){
        radio_id = "none";
      }else{
        radio_id = $("input[name='inlineRadioOptions']:checked").val();
      }
      var url = $("#ajax_division").val();
      console.log(url + "/" + radio_id);
      window.location.href = url + "/" + radio_id;
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

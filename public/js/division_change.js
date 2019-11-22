$(function () {
    $("#division_inputState").change(function () {
      console.log($(this).val());
      var division_id = $(this).val();
      var url = $("#ajax_division").val();
      console.log(url + division_id);
      window.addEventListener('beforeunload', function (e) {
        // イベントをキャンセルする
        e.preventDefault();

        // Chrome では returnValue を設定する必要がある
        e.returnValue = '';


      });
      window.location.href = url + division_id;
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
      //     }
      // })
      // $.ajax({
      //   type: 'POST',
      //     url: url + division_id,
      // });
   });
});

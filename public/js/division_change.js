$(function () {
    $("#division_inputState").change(function () {
      console.log($(this).val());
      var division_id = $(this).val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
          }
      })
      $.ajax({
        type: 'POST',
          url: {{"route('sale-registrationload', compact(division_id))"}}
      })
   });
});

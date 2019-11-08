$(function () {
  $('#supplier').change(function () {
    $('#supplier').val()

    $('#supplier option').each(function(index, element){
      if($('#supplier').val() != element.value){
        $('#' + element.value).hide();
      }else{
        $('#' + element.value).show(); 
      }
    });
  });
});

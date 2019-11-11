$(function () {
  $('#supplier').change(function () {
    $('#supplier option').each(function(index, element){
      if( $('#supplier').val() == 0 ){
        alert("全て印刷");
      }else if($('#supplier').val() != element.value){
        $('#' + element.value).hide();
      }else{
        $('#' + element.value).show(); 
      }
    });
  });
});

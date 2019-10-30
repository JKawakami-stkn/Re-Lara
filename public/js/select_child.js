if($('#class').val() != null){
    $('#name').prop('disabled', false);
}

$('#class').change( function() {
console.log($('#class').val())
  $('#name').prop('disabled', false);
});
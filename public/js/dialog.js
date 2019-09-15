
window.onbeforeunload = function(e) {
  e.returnValue = "入力内容が破棄されます。よろしいですか？";
  console.log(e);
}

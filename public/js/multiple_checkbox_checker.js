function checkbox_check(){
    if ( $("input[type=checkbox]:not(:checked)").length == 0 ) {
        return true;
    }else{
        alert("引き渡されていない商品があります。");
        return false;
    }
}

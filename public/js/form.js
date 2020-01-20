$(function () {
    $(".size-add-button-addon").click(function () {
        console.log("追加")
        $(this).parent().parent().clone(true).appendTo('#size-form-row');
        $(".size").last().val('');
    });
});
$(function () {
    $(".size-remove-button-addon").click(function () {
        console.log("削除")
        if ($(".input-group-size").length > 1) {
            $(this).parent().parent().remove();
        }
    });
});

$(function () {
    $(".color-add-button-addon").click(function () {
        console.log("追加")
        $(this).parent().parent().clone(true).appendTo('#color-form-row');
        $(".color").last().val('');
    });
});
$(function () {
    $(".color-remove-button-addon").click(function () {
        console.log("削除")
        if ($(".input-group-color").length > 1) {
            $(this).parent().parent().remove();
        }
    });
});

var size_obj;
var color_obj;
var size_before = "yes";
var color_before = "yes";
//no
$(function () {
    $("#inlineRadio2").click(function () {
        if(size_before == "yes"){
          size_obj = $("#input_size").detach();
          size_before = "no";
        }
    });
});
//yes
$(function () {
    $("#inlineRadio1").click(function () {
      if(size_before == "no"){
          $("#no_radio").after(size_obj);
          size_before = "yes";
      }
    });
});

//no
$(function () {
    $("#color_inlineRadio2").click(function () {
        if(color_before == "yes"){
          color_obj = $("#input_color").detach();
          color_before = "no";
        }
    });
});
//yes
$(function () {
    $("#color_inlineRadio1").click(function () {
      if(color_before == "no"){
          $("#no_radio2").after(color_obj);
          color_before = "yes";
      }
    });
});

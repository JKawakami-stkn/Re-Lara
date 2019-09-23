$(function () {
    $(".size-add-button-addon").click(function () {
        console.log("追加")
        $(this).parent().parent().clone(true).appendTo('#size-form-row');
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
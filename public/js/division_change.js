var searchItem = '.search_item';   // 絞り込む項目を選択するエリア
var listItem = '.list_item';       // 絞り込み対象のアイテム
var hideClass = 'is-hide';         // 絞り込み対象外の場合に付与されるclass名
var activeClass = 'is-active';     // 選択中のグループに付与されるclass名

$(function() {
    // 絞り込みを変更した時
    $("#division_inputState").on('change', function() {
        $(searchItem).parent().removeClass(activeClass);
        console.log($(this).val());
        var group = $("option:selected").addClass(activeClass).data('group');
        search_filter(group);
    });
});

/**
 * リストの絞り込みを行う
 * @param {String} group data属性の値
 */
function search_filter(group) {
    // 非表示状態を解除

    $(listItem).parent().removeClass(hideClass);
    // 値が空の場合はすべて表示
    if(group == '1') {
        console.log("all");
        return;
    }
    // リスト内の各アイテムをチェック
    for (var i = 0; i < $(listItem).length; i++) {
        // アイテムに設定している項目を取得
        var itemData = $(listItem).eq(i).data('group');
        console.log($(listItem).eq(i).data("group"));
        // 絞り込み対象かどうかを調べる
        if(itemData !== group) {
            $(listItem).eq(i).parent().addClass(hideClass);
            console.log($(listItem).eq(i));
        }
    }
}

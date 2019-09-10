
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>sample</title>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>



<script>
$(function(){ // 遅延処理
  $('#button').click(
    function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: 'POST',
            url: '{{ route('contacts.ajax') }}',
            dataType: 'json', // 読み込むデータの種類
        }).done(function (results) {
            // 成功時の処理
            //$('#text').html(results);
            console.log(results)
        }).fail(function (err) {
            // 失敗時の処理
            alert('ファイルの取得に失敗しました。');
        });
    }
  );
});
</script>

</head>
<body>
<input type="button" id="button" value="「sample2.html」取得" />
<br>
<div id="text"></div>
</body>
</html>

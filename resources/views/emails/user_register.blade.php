<h3>
    <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
</h3>
<p>
    {{ __('下記リンクから商品購入画面へ進んでください') }}<br>
    {{ __('もし心当たりがない場合はなんとかかんとか') }}
</p>
<p>
    リンク: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
    トークン：{{ $actionText }}
</p>
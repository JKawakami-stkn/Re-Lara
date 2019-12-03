<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <!-- フォント -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sticky-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkbox.css') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    @yield('style')
    <title>Partone</title>
</head>

<body>
    @component('components.header-outside')
    @endcomponent

    @yield('content')

    @component('components.footer')
    @endcomponent

    <!-- JavaScript -->
    <script src=" {{ asset('js/jquery-3.4.1.min.js' )}} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/bfb7cb4853.js" crossorigin="anonymous"></script>

    @yield('script')

    <script>
    // ツールチップ
    $('[data-toggle="tooltip"]').tooltip()

    // service workerの登録関係
    if('serviceWorker' in navigator) {
    navigator.serviceWorker
            .register('{{ asset("sw.js") }}')
            .then(function() { console.log("Service Worker Registered"); });
    }

    </script>
</body>

</html>

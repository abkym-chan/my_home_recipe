<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    @section('css')
    @show
</head>
<body class="pb-4">
    <!-- ヘッダー -->
    @include('includes.header')
    <!-- フラッシュメッセージ -->
    @include('includes.flashmessage')
    <!-- メインコンテンツ -->
    @section('main')
        <div>コンテンツ</div>
    @show
    <!-- フッター -->
    @include('includes.footer')

    <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>

    @section('js')
    @show
</body>
</html>

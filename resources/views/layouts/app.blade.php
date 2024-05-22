<html>
    <head>
        <title>Загрузка - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .img-thumbnail-small {
                width:50px;
                height: auto;
            }
            .flex-container {
                display: flex;
                align-items: center;
            }

            .delete-button {
                margin-left: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <a href="{{ route('start') }}">Главная страница</a>
            <a href="{{ route('viewing.file') }}">Просмотр файлов</a>
            @yield('content')
            @yield('name')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
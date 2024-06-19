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
            <div>
                        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    >Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
                </ul>
            </li>
            </div>
            @yield('content')
            @yield('name')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
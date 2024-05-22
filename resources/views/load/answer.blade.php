@extends('layouts.app')
<html>
    <head>
        <title>Загрузка - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @if(isset($filename))
                <p>Файл загружен</p>
            @else
            <p>Файл не был получен</p>
            @endif
        </div>
    </body>
</html>
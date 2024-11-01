@extends('layouts.app')
<html>
<head>
    <title>Загрузка - @yield('title')</title>
</head>
<body>
<div class="container">
    @if(isset($filename))
        <p>Файл загружен</p>
    @endif
</div>
</body>
</html>

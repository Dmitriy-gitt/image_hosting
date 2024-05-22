@extends('layouts.app')
@section('content')
    <table class="table"> <!-- Используем классы Bootstrap для стилизации таблицы -->
        <thead>
            <tr>
                <th>Название файла</th>
                <th>Дата и время загрузки</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
        <tr>
            <td>{{ $file->name }}</td>
            <td>{{ $file->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <!-- Выводим превью изображения -->
                <div class="flex-container">
                    <form action="{{route('zip.file', $file->id)}}" method="GET">
                        <a href="{{ asset('images/' . $file->name) }}" target="_blank">
                            <img src="{{ asset('images/' . $file->name) }}" class="img-thumbnail img-thumbnail-small" alt="Превью {{ $file->name }}">
                        </a>
                        <input style='margin-left: 5px;' value="Zip" type='submit'>
                        <!-- Кнопка удаления -->
                    </form>
                    <form action="{{ route('file.delete', $file->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" style="margin-left: 10px;">Удалить</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Загрузите файлы</h1>
    <br>
    {{ Form::open(['url' => route('download.file'), 'method' => 'post', 'files' => true]) }}
        {{ Form::file('files[]', ['multiple' => true]) }}
        {{ Form::submit('Загрузить') }}
    {{ Form::close() }}
@endsection
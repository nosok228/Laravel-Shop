@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список категорий</h1>
        <br>
        <a href="{{ route('category.add') }}" class="btn btn-info">Добавить Категорию</a>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
            </tr>
            @if(isset($success))
                <script>alert("Действие успешно выполнено");</script>
            @endif
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{!! $category->description  !!}</td>
                    <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                    <td><a href="{{ route('index') }}/admin/category-edit/{{ $category->id }}">Редактировать</a> ||
                        <a href="{{ route('index') }}/admin/category-delete/{{ $category->id }}">Удалить</a>
                </tr>
            @endforeach
        </table>
    </main>
@stop

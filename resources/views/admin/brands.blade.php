@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список брендов</h1>
        <br>
        <a href="{{ route('brand.add') }}" class="btn btn-info">Добавить Бренд</a>
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
            @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->title}}</td>
                    <td>{!! $brand->description  !!}</td>
                    <td>{{ $brand->created_at->format('d-m-Y H:i') }}</td>
                    <td><a href="{{ route('index') }}/admin/brand-edit/{{ $brand->id }}">Редактировать</a> ||
                        <a href="{{ route('index') }}/admin/brand-delete/{{ $brand->id }}">Удалить</a>
                </tr>
            @endforeach
        </table>
    </main>
@stop

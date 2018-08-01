@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать категорию</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Название категории:<br><input type="text" name="title" class="form-control" value = "{{ $category->title }}"   required> </p>
            <p>Описание:<br><textarea name="description" class="form-control">{{ $category->description }}</textarea></p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Редактировать</button>
            <br><br>
        </form>
    </main>
@stop
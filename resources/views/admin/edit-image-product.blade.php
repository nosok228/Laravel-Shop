@extends('layouts.admin')
@section('content')


    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Добавить статью</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>Текущая фотография:<br><image src = "/images/product/{{ $product->img }}"></p>
            <p>Новое фото:<br><input type="file" name="photo" class="form-control" required> </p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Добавить</button>
            <br><br>
        </form>
    </main>
@stop
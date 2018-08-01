@extends('layouts.admin')
@section('content')


    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать статью</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Выбор категории:<br><select name="category_id" class="form-control">
                  @foreach($categories as $category)
                       <option value="{{$category->id}}">{{ $category->title}}</option>
                  @endforeach
            </select> </p>
            <p>Выбор бренда:<br><select name="brand_id" class="form-control">
                @foreach($brands as $brand)
                     <option value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
          </select> </p>
            <p>Название продукта:<br><input type="text" name="title" class="form-control"   required> </p>
            <p>Описание:<br><textarea name="description" class="form-control"></textarea></p>
            <p>Цена:<br><input type="number" name="price" class="form-control"  required> </p>
            <p>Изображение:<br><input type="file" name="photo" class="form-control" multiple accept="image/*,image/jpeg" required> </p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Добавить</button>
            <br><br>
        </form>
    </main>
@stop
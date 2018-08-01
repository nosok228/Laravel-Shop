@extends('layouts.admin')
@section('content')


    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Редактировать продук</h1>
        <br>
        <form method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <p>Выбор категории:<br><select name="category_id" class="form-control">
                  @foreach($categories as $category)
                       <option value="{{$category->id}}"
                            @if($category->id == $product->category_id)  selected @endif>{{$category->title}}</option>
                  @endforeach
            </select> </p>
            <p>Выбор бренда:<br><select name="brand_id" class="form-control">
                @foreach($brands as $brand)
                     <option value="{{$brand->id}}"
                            @if($brand->id == $product->brand_id)  selected @endif>{{$brand->title}}</option>
                @endforeach
          </select> </p>
            <p>Название продукта:<br><input type="text" name="title" class="form-control" value = "{{ $product->title }}" required> </p>
            <p>Описание:<br><textarea name="description" class="form-control">{{ $product->description }}</textarea></p>
            <p>Цена:<br><input type="number" name="price" class="form-control"  value = "{{ $product->price }}" required> </p>
            <p><a href = "{{ route('index') }}/admin/product-edit-image/{{ $product->id }}">Изменить фотографию</a></p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Редактировать</button>
            <br><br>
        </form>
    </main>
@stop
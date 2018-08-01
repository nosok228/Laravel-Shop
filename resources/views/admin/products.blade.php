@extends('layouts.admin')
@section('content')
    <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
        <h1>Список статей</h1>
        <br>
        <a href="{{ route('product.add') }}" class="btn btn-info">Добавить продукт</a>
        <br><br><br>
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
            @if(isset($success))
                <script>alert("Действие успешно выполнено");</script>
            @endif
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{!! $product->description  !!}</td>
                    <td>{{ $product->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $product->status}}</td>
                    <td><a href="{{ route('index') }}/admin/product-edit/{{ $product->id }}">Редактировать</a> ||
                        <a href="{{ route('index') }}/admin/product-delete/{{ $product->id }}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
    </main>
@stop
{{-- @section('js')
    <script>
        $(function(){
            $(".delete").on('click', function () {
                if(confirm("Вы действительно хотите удалить эту запись ?")) {
                    let id = $(this).attr("rel");
                    $.ajax({
                        type: "DELETE",
                        url: "{!! route('product.delete') !!}",
                        data: {_token:"{{csrf_token()}}", id:id},
                        complete: function() {
                            alert("Статья удалена");
                            location.reload();
                        }
                    });
                }else{
                    alertify.error("Дествие отменено пользователем");
                }
            });
        });
    </script>
@stop --}}
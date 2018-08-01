@extends('layouts.default')
    @section('content')

    <div id="content" class="float_r">
    <h1>{{ $product->title }}</h1>
    <div class="content_half float_l">
    <img src="/images/product/{{ $product->img }}" alt="Image 01" /></a>
    </div>
    <div class="content_half float_r">
        <table>
            <tr>
                <td height="30" width="160">Цена:</td>
                <td>${{ $product->price }}</td>
            </tr>
            <tr>
                <td height="30">Наличие товара:</td>
                @if($product->status)
                <td style="color:green">Товар в наличии</td>
                @else
                <td style="color:red">Товара нет в наличии</td>
                @endif
            </tr>
            <tr>
                <td height="30">Модель:</td>
                <td>Product {{ $product->id }}</td>
            </tr>
            <tr>
                <td height="30">Бренд:</td>
                <td>Apple</td>
            </tr>
            <tr><td height="30">Количество</td><td><input type="text" value="1" style="width: 20px; text-align: right" /></td></tr>
        </table>
        <div class="cleaner h20"></div>
        <a href="shoppingcart.html" class="add_to_card">Добавить в крозину</a>
			</div>
            <div class="cleaner h30"></div>
            
            <h5>Описание товара</h5>
            <p>{{ $product->description }}.</p>	
            
            <div class="cleaner h50"></div>
            
            
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   @endsection
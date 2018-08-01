@extends('layouts.default')
    @section('content')
            
        <div id="content" class="float_r">
            <h1>{{ $category->title }}</h1>
                @foreach($products as $product):
            <div class="product_box">
            	<a href="productdetail.html"><img src="/images/product/{{ $product->img }}" alt="Image 01" /></a>
                <h3>{{ $product->description }}</h3>
                <p class="product_price">$ {{ $product->price }}</p>
                <a href="shoppingcart.html" class="add_to_card">Add to Cart</a>
                <a href="/product/{{ $product->id }}" class="detail">Detail</a>
            </div>       
                @endforeach 	
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
   @endsection
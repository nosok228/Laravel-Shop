<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('index')->with(['products' => $products]);
    }

    public function category(int $id)
    {
        $category = Category::where('id', $id)->first();
        $products = Product::where('category_id', $category->id)->get();

        return view('category')->with(['products' => $products, 'category' => $category]);
    }

    public function product(int $id)
    {
        $product = Product::where('id', $id)->first();
        

        return view('productdetail')->with('product', $product);
    }


}

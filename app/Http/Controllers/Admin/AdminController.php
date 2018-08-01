<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }

    public function products()
    {
        $products = Product::all();
        
        return view('admin.products')->with(['products' => $products]);
    }

    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories')->with('categories', $categories);
    }

    public function brands()
    {
        $brands = Brand::all();

        return view('admin.brands')->with('brands', $brands);
    }

    
}

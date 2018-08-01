<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageInt;

class ProductController extends Controller
{
    public function showAddProductForm()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.add-product')->with(['categories' => $categories, 'brands' => $brands]);
    }

    public function addProduct(Request $request)
    {
        $filename = $this->saveImage($request->file('photo'));
        
        $result = Product::create(['title' => $request->title, 'description' => $request->description,
        'price' => $request->price, 'category_id' => $request->category_id, 'brand_id' => $request->brand_id, 'img' => $filename]);
        
             if($result)
             {
                 return redirect(route('admin'))->with('success', 'Продукт успешно добавлен');
             }
    }

    public function showEditProductForm(int $id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        $brands = Brand::all();
        
        return view('admin.edit-product')->with(['product' => $product, 'categories' => $categories, 'brands' => $brands]);
    }

    public function editProduct(int $id, Request $request)
    {

        $product = Product::where('id', $id)->first();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect(route('products'))->with('success', true);
    }

    public function showEditImageProductForm(int $id)
    {
        $product = Product::where('id', $id)->first();
        
        return view('admin.edit-image-product')->with(['product' => $product]);
    }

    public function editImageProduct(int $id, Request $request)
    {
       $filename = $this->saveImage($request->file('photo'));

       $product = Product::where('id', $id)->first();
       unlink(public_path().'/images/product/'.$product->img);
       $product->img = $filename;
       $product->save();

       return redirect(route('products'))->with('success', true);
    }

    private function saveImage($file)
    {
            $path = public_path().'/images/product/';
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
            $img = ImageInt::make($file);
            $img->resize(320,240)->save($path . $filename);
            return $filename;
    }

    public function deleteProduct(int $id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect(route('products'))->with('success', true);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function showAddBrandForm()
    {
        return view('admin.add-brand');
    }

    public function addBrand(Request $request)
    {
        $result = Brand::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($result)
        {
            return redirect(route('brands'));
        }
    }

    public function showEditBrandForm(int $id)
    {
        $brand = Brand::where('id', $id)->first();

        return view('admin.edit-brand')->with('brand', $brand);
    }

    public function editBrand(int $id, Request $request)
    {
        $brand = Brand::where('id', $id)->first();
        $brand->title = $request->title;
        $brand->description = $request->description;
        $brand->save();

        return redirect(route('brands'));
    }

    public function deleteBrand(int $id)
    {
        $brand = Brand::where('id', $id)->first();
        $brand->delete();

        return redirect(route('brands'));
    }
}

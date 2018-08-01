<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function showAddCategoryForm()
    {
        return view('admin.add-category');
    }

    public function addCategory(Request $request)
    {
        $result = Category::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($result)
        {
            return redirect(route('categories'));
        }
    }

    public function showEditCategoryForm(int $id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.edit-category')->with('category', $category);
    }

    public function editCategory(int $id, Request $request)
    {
        $category = Category::where('id', $id)->first();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect(route('categories'));
    }

    public function deleteCategory(int $id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect(route('categories'));
    }
}

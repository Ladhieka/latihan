<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function create()
    {
        return view('create-category');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/category');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }
}

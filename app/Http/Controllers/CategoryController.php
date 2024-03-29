<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // return Category::with('subCategories')->whereNull('parent_id')->get();

        return view('dashboard.categories.index', [
            'categories' => Category::with('subCategories')->whereNull('parent_id')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::with('subCategories')->whereNull('parent_id')->get(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $category               = new Category;
        $category->name         = $request->name;
        $category->parent_id    = $request->parent_id;
        $category->slug         = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully created');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category successfully change');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted');
    }
}

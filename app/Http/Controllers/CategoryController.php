<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $category->category_id . ',category_id',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}
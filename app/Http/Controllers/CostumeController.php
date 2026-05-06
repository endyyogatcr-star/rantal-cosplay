<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use App\Models\Category;
use Illuminate\Http\Request;

class CostumeController extends Controller
{
    public function index()
    {
        $costumes = Costume::with('category')->paginate(12);
        return view('admin.costumes.index', compact('costumes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.costumes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'character' => 'required|string|max:255',
            'size' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('costumes', 'public');
        }

        Costume::create($data);

        return redirect()->route('admin.costumes.index')
                         ->with('success', 'Costume berhasil ditambahkan.');
    }

    public function show(Costume $costume)
    {
        return view('admin.costumes.show', compact('costume'));
    }

    public function edit(Costume $costume)
    {
        $categories = Category::all();
        return view('admin.costumes.edit', compact('costume', 'categories'));
    }

    public function update(Request $request, Costume $costume)
    {
        // Validation sama seperti store
        $request->validate([
            'name' => 'required|string|max:255',
            'character' => 'required|string|max:255',
            'size' => 'required|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('costumes', 'public');
        }

        $costume->update($data);

        return redirect()->route('costumes.index')
                         ->with('success', 'Costume berhasil diupdate.');
    }

    public function destroy(Costume $costume)
    {
        $costume->delete();
        return redirect()->route('costumes.index')
                         ->with('success', 'Costume berhasil dihapus.');
    }
}

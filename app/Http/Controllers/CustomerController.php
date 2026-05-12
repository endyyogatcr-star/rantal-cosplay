<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $featuredCostumes = Costume::with('category')
                            ->where('stock', '>', 0)
                            ->latest()
                            ->take(8)
                            ->get();

        $categories = Category::all();

        return view('customer.home', compact('featuredCostumes', 'categories'));
    }

    public function shop(Request $request)
    {
        $query = Costume::with('category')->where('stock', '>', 0);

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('character', 'like', "%{$search}%");
            });
        }

        // Filter Kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $costumes = $query->paginate(12);
        $categories = Category::all();

        return view('customer.shop', compact('costumes', 'categories'));
    }

    public function show(Costume $costume)
    {
        $relatedCostumes = Costume::with('category')
                            ->where('category_id', $costume->category_id)
                            ->where('costume_id', '!=', $costume->costume_id)
                            ->where('stock', '>', 0)
                            ->take(4)
                            ->get();

        return view('customer.detail', compact('costume', 'relatedCostumes'));
    }
}
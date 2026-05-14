<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Costume $costume)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                         ->with('error', 'Silakan login terlebih dahulu untuk menyewa costume.');
        }
        
        $cart = session()->get('cart', []);

        if (isset($cart[$costume->costume_id])) {
            return redirect()->back()->with('info', 'Costume sudah ada di keranjang.');
        }

        // Cek stok
        if ($costume->stock < 1) {
            return redirect()->back()->with('error', 'Maaf, stok costume ini sedang kosong.');
        }

        $cart[$costume->costume_id] = [
            'costume_id' => $costume->costume_id,
            'name'       => $costume->name,
            'character'  => $costume->character,
            'price'      => $costume->price,
            'image'      => $costume->image,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
                         ->with('success', 'Costume berhasil ditambahkan ke keranjang!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum('price');

        return view('customer.cart', compact('cart', 'total'));
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')
                         ->with('success', 'Costume dihapus dari keranjang.');
    }
}
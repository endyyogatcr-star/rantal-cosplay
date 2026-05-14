<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        $total = collect($cart)->sum('price');

        return view('customer.checkout', compact('cart', 'total'));
    }

    public function confirm()
    {
        $checkoutData = session()->get('checkout_data');

        if (!$checkoutData) {
            return redirect()->route('cart.index')
                             ->with('error', 'Data checkout hilang. Silakan ulangi proses.');
        }

        return view('customer.order-confirm', compact('checkoutData'));
    }

    // Method ini yang error tadi
    public function storeOrder(Request $request)
    {
        $checkoutData = session()->get('checkout_data');

        if (!$checkoutData) {
            return redirect()->route('cart.index')
                             ->with('error', 'Data checkout hilang. Silakan ulangi proses.');
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id'      => auth()->id(),
                'order_date'   => now(),
                'start_date'   => $checkoutData['start_date'],
                'end_date'     => $checkoutData['end_date'],
                'total_price'  => $checkoutData['total_price'],
                'status'       => 'pending',
            ]);

            foreach ($checkoutData['cart'] as $item) {
                OrderDetail::create([
                    'order_id'    => $order->order_id,
                    'costume_id'  => $item['costume_id'],
                    'start_date'  => $checkoutData['start_date'],
                    'end_date'    => $checkoutData['end_date'],
                    'total_price' => $item['price'],
                    'status'      => 'active',
                ]);
            }

            session()->forget('cart');
            session()->forget('checkout_data');

            DB::commit();

            return redirect()->route('profile.edit')
                             ->with('success', '✅ Order berhasil dibuat! Silakan tunggu konfirmasi admin.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
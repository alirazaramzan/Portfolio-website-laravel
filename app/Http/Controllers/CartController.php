<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the cart page.
     */
    public function view()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    /**
     * Add an item to the cart.
     * Expects form fields: id, name, price (quantity optional).
     */
    public function add(Request $request)
    {
        $request->validate([
            'id'       => 'required',
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $id  = $request->input('id');
        $qty = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'name'     => $request->input('name'),
                'price'    => (float) $request->input('price'),
                'quantity' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Item added to cart!');
    }

    /**
     * Show the checkout form for user details.
     */
    public function checkoutForm()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('info', 'Your cart is empty.');
        }

        return view('checkout', compact('cart'));
    }

    /**
     * Handle checkout form submission.
     */
    public function checkoutSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone'   => 'required|string|max:15',
        ]);

        // You could save the order to DB here (optional)
        session()->forget('cart');

        return redirect()->route('cart.view')->with('success', 'Checkout completed! Thank you, ' . $request->name . '.');
    }

    /**
     * Simple checkout route to simulate order completion (optional).
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('info', 'Your cart is empty.');
        }

        session()->forget('cart');

        return redirect()->route('cart.view')->with('success', 'Checkout completed successfully!');
    }
}

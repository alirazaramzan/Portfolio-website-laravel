<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the cart page.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart')); // Make sure this matches your Blade file
    }
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

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $index = $request->id;   // this is the array index of the item
        $action = $request->action;

        if (!isset($cart[$index])) {
            return response()->json(['error' => 'Item not found']);
        }

        // Update quantity
        if ($action === 'plus') {
            $cart[$index]['quantity'] += 1;
        } elseif ($action === 'minus') {
            if ($cart[$index]['quantity'] > 1) {
                $cart[$index]['quantity'] -= 1;
            }
        }

        // Save back to session
        session()->put('cart', $cart);

        // Recalculate totals
        $itemTotal = $cart[$index]['price'] * $cart[$index]['quantity'];
        $cartTotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return response()->json([
            'quantity' => $cart[$index]['quantity'],
            'item_total' => $itemTotal,
            'cart_total' => $cartTotal
        ]);
    }

}

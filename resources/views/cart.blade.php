@extends('layouts.app')

@section('title', 'Cart | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Your Cart</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(empty($cart))
            <p class="text-center">Your cart is empty.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Project</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>PKR{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>PKR{{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h4 class="text-end mt-3">Total: PKR{{ $total }}</h4>

            <div class="text-end mt-3">
                <a href="{{ route('cart.checkout.form') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>

        @endif
    </section>
@endsection

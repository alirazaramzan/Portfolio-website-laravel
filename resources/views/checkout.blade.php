@extends('layouts.app')

@section('title', 'Checkout | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">Checkout</h2>

        <form action="{{ route('cart.checkout.submit') }}" method="POST" class="w-50 mx-auto shadow p-4 rounded bg-light">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Submit Order</button>
        </form>
    </section>
@endsection

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
                @foreach($cart as $index => $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp

                    <tr data-id="{{ $index }}">
                        <td>{{ $item['name'] }}</td>
                        <td>PKR{{ $item['price'] }}</td>

                        <td>
                            <button class="btn btn-sm btn-outline-dark update-qty" data-action="minus">-</button>
                            <span class="mx-2 qty">{{ $item['quantity'] }}</span>
                            <button class="btn btn-sm btn-outline-dark update-qty" data-action="plus">+</button>
                        </td>

                        <td class="item-total">PKR{{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            <h4 class="text-end mt-3 fw-bold">Total: <span id="cart-total">PKR{{ $total }}</span></h4>

            <div class="text-end mt-3">
                <a href="{{ route('cart.checkout.form') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @endif
    </section>

    {{-- JavaScript for AJAX quantity update --}}
    <script>
        document.querySelectorAll(".update-qty").forEach(btn => {
            btn.addEventListener("click", function() {
                let action = this.dataset.action;
                let row = this.closest("tr");
                let id = row.dataset.id;

                fetch("{{ route('cart.update') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ id: id, action: action })
                })
                    .then(res => res.json())
                    .then(data => {
                        row.querySelector(".qty").innerText = data.quantity;
                        row.querySelector(".item-total").innerText = "PKR" + data.item_total;
                        document.getElementById("cart-total").innerText = "PKR" + data.cart_total;
                    });
            });
        });
    </script>

@endsection

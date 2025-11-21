@extends('layouts.app')

@section('title', $product->name . ' | Product Details')

@section('content')
    <section class="container py-5 mt-5">
        <div class="row">

            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded shadow" alt="No image">
                @endif
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <p class="mt-3">{{ $product->description }}</p>

                <h4 class="fw-bold mt-4">PKR {{ number_format($product->price) }}</h4>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <div class="mb-3" style="max-width:150px;">
                        <label class="form-label fw-bold">Quantity</label>
                        <select name="quantity" class="form-select">
                            @for($i=1;$i<=10;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <button class="btn btn-dark btn-lg" type="submit">Add to Cart</button>
                </form>

                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary mt-3">
                    ← Back to Products
                </a>
            </div>

        </div>
    </section>
@endsection

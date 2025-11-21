@extends('layouts.app')

@section('title', 'Projects | Ali Raza')

@section('content')
    <section class="container py-5 mt-5">
        <h2 class="text-center mb-4 fw-bold">My Design Projects</h2>
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="fw-bold">PKR {{ $product->price }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" class="btn btn-dark btn-sm mt-2">Add to Cart</button>
                            </form>

                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm mt-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            {{ $products->links() }} <!-- pagination -->
        </div>
    </section>
@endsection

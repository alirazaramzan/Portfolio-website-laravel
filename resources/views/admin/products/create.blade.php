@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="container py-5 mt-5">
        <h2>Add New Product</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">

            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (PKR)</label>
                <input name="price" type="number" value="{{ old('price', 0) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Product Image</label>
                <input type="file" name="image" class="form-control">
                @if(isset($product) && $product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mt-2">
                @endif
            </div>



            <button class="btn btn-primary">Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
@endsection

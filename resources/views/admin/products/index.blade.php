@extends('layouts.app')

@section('title', 'Admin - Products')

@section('content')
    <div class="container py-5 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Products</h2>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th width="80">#</th>
                <th>Name</th>
                <th width="120">Price</th>
                <th width="120">Image</th>
                <th width="200">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>PKR {{ number_format($p->price) }}</td>
                    <td>
                        @if($p->image)
                            <img src="{{ asset('storage/' . $p->image) }}" alt="" style="width:80px;height:50px;object-fit:cover;border-radius:4px;">
                        @else
                            —
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                        <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this products?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No products yet.</td></tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection
